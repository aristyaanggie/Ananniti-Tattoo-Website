<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\AuditLog;
use App\Repositories\Contracts\SectionRepositoryInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SectionService
{
    public function __construct(
        protected SectionRepositoryInterface $sectionRepository,
    ) {}

    public function getAllSections()
    {
        return $this->sectionRepository->all();
    }

    public function getSectionById(int $id)
    {
        return $this->sectionRepository->find($id);
    }

    public function getSectionBySlug(string $slug)
    {
        return $this->sectionRepository->findBySlug($slug);
    }

    public function updateSection(int $id, array $data)
    {
        $section = $this->sectionRepository->find($id);
        if (!$section) {
            return null;
        }

        // Handle image upload
        if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
            if ($section->image) {
                $this->deleteFile($section->image);
            }
            $data['image'] = $this->uploadImage($data['image']);
        } else {
            unset($data['image']);
        }

        $updated = $this->sectionRepository->update($id, $data);

        if ($updated) {
            $this->logAudit('updated', $updated);
        }

        return $updated;
    }

    protected function uploadImage(UploadedFile $file): string
    {
        return $file->store('sections', 'public');
    }

    protected function deleteFile(string $path): void
    {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
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
