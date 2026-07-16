<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Contracts\ReviewRepositoryInterface;

class ReviewRepository implements ReviewRepositoryInterface
{
    public function __construct(
        protected Review $model,
    ) {}

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $review = $this->model->find($id);
        if ($review) {
            $review->update($data);
        }
        return $review;
    }

    public function delete(int $id)
    {
        $review = $this->model->find($id);
        if ($review) {
            $review->delete();
        }
        return $review;
    }

    public function getFeatured()
    {
        return $this->model->where('is_featured', true)->get();
    }

    public function getByProduct(int $productId)
    {
        return $this->model->where('product_id', $productId)->get();
    }

    public function getByArtist(int $artistId)
    {
        return $this->model->where('artist_id', $artistId)->get();
    }
}
