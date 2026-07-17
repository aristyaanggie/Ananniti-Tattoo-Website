<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AuditLog;
use App\Models\ProductGallery;
use App\Repositories\Contracts\ProductRepositoryInterface;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductService
{
    public function __construct(
        protected ProductRepositoryInterface $productRepository,
    ) {}

    public function getAllProducts()
    {
        return $this->productRepository->all();
    }

    public function getProductById(int $id)
    {
        return $this->productRepository->find($id);
    }

    public function getProductBySlug(string $slug)
    {
        return $this->productRepository->findBySlug($slug);
    }

    public function createProduct(array $data)
    {
        $data['slug'] = $this->generateUniqueSlug($data['slug'] ?? $data['name']);

        if (isset($data['status'])) {
            $data['is_visible'] = $data['status'] === 'publish';
            unset($data['status']);
        }

        // Handle thumbnail upload
        if (isset($data['thumbnail']) && $data['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
            $data['thumbnail'] = $this->uploadThumbnail($data['thumbnail']);
        } else {
            unset($data['thumbnail']);
        }

        // Handle gallery upload
        $galleryFiles = $data['gallery'] ?? null;
        unset($data['gallery']);

        $product = $this->productRepository->create($data);

        // Upload gallery images
        if ($galleryFiles) {
            $this->uploadGalleryImages($product->id, $galleryFiles);
        }

        $this->logAudit('created', $product);

        return $product;
    }

    public function updateProduct(int $id, array $data)
    {
        if (isset($data['slug'])) {
            $data['slug'] = $this->generateUniqueSlug($data['slug'], $id);
        }

        if (isset($data['status'])) {
            $data['is_visible'] = $data['status'] === 'publish';
            unset($data['status']);
        }

        // Handle thumbnail upload
        if (isset($data['thumbnail']) && $data['thumbnail'] instanceof \Illuminate\Http\UploadedFile) {
            $product = $this->productRepository->find($id);
            if ($product && $product->thumbnail) {
                $this->deleteFile($product->thumbnail);
            }
            $data['thumbnail'] = $this->uploadThumbnail($data['thumbnail']);
        } else {
            unset($data['thumbnail']);
        }

        // Handle gallery upload
        $galleryFiles = $data['gallery'] ?? null;
        unset($data['gallery']);

        $product = $this->productRepository->update($id, $data);

        // Upload new gallery images
        if ($galleryFiles) {
            $this->uploadGalleryImages($id, $galleryFiles);
        }

        if ($product) {
            $this->logAudit('updated', $product);
        }

        return $product;
    }

    public function deleteProduct(int $id)
    {
        $product = $this->productRepository->find($id);
        if ($product) {
            // Delete thumbnail file
            if ($product->thumbnail) {
                $this->deleteFile($product->thumbnail);
            }

            // Delete gallery images
            foreach ($product->galleries as $gallery) {
                $this->deleteFile($gallery->image);
                $gallery->delete();
            }

            $this->logAudit('deleted', $product);
            $this->productRepository->delete($id);
        }
        return $product;
    }

    public function restoreProduct(int $id)
    {
        $product = $this->productRepository->findWithTrashed($id);
        if ($product) {
            $this->productRepository->restore($id);
            $restored = $this->productRepository->find($id);
            if ($restored) {
                $this->logAudit('restored', $restored);
            }
            return $restored;
        }
        return null;
    }

    public function toggleProductStatus(int $id)
    {
        $product = $this->productRepository->find($id);
        if ($product) {
            $this->productRepository->toggleStatus($id);
            $updated = $this->productRepository->find($id);
            $action = $updated->is_visible ? 'published' : 'unpublished';
            $this->logAudit($action, $updated);
            return $updated;
        }
        return null;
    }

    public function publishProduct(int $id)
    {
        $product = $this->productRepository->publish($id);
        if ($product) {
            $this->logAudit('published', $product);
        }
        return $product;
    }

    public function unpublishProduct(int $id)
    {
        $product = $this->productRepository->unpublish($id);
        if ($product) {
            $this->logAudit('unpublished', $product);
        }
        return $product;
    }

    public function getProductsByCategory(int $categoryId)
    {
        return $this->productRepository->getByCategory($categoryId);
    }

    public function getFeaturedProducts()
    {
        return $this->productRepository->getFeatured();
    }

    public function getVisibleProducts()
    {
        return $this->productRepository->getVisible();
    }

    public function getTrashedProducts()
    {
        return $this->productRepository->getTrashed();
    }

    public function deleteGalleryImage(int $galleryId): bool
    {
        $gallery = ProductGallery::find($galleryId);
        if ($gallery) {
            $this->deleteFile($gallery->image);
            $gallery->delete();
            return true;
        }
        return false;
    }

    protected function uploadThumbnail(\Illuminate\Http\UploadedFile $file): string
    {
        return $file->store('products', 'public');
    }

    protected function uploadGalleryImages(int $productId, array $files): void
    {
        foreach ($files as $index => $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $path = $file->store('products/gallery', 'public');
                ProductGallery::create([
                    'product_id' => $productId,
                    'image' => $path,
                    'display_order' => $index,
                    'is_primary' => false,
                ]);
            }
        }
    }

    protected function deleteFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    protected function generateUniqueSlug(string $name, ?int $ignoreId = null): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (true) {
            $existing = $this->productRepository->findBySlug($slug);

            if (!$existing || ($ignoreId && $existing->id === $ignoreId)) {
                break;
            }

            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    protected function logAudit(string $action, $model): void
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'model_type' => get_class($model),
            'model_id' => $model->id,
            'old_values' => $action === 'updated' ? $model->getOriginal() : null,
            'new_values' => $action !== 'deleted' ? $model->toArray() : null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
