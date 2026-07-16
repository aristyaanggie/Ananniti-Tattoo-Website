<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Contracts\ReviewRepositoryInterface;

class ReviewService
{
    public function __construct(
        protected ReviewRepositoryInterface $reviewRepository,
    ) {}

    public function getAllReviews()
    {
        return $this->reviewRepository->all();
    }

    public function getReviewById(int $id)
    {
        return $this->reviewRepository->find($id);
    }

    public function createReview(array $data)
    {
        return $this->reviewRepository->create($data);
    }

    public function updateReview(int $id, array $data)
    {
        return $this->reviewRepository->update($id, $data);
    }

    public function deleteReview(int $id)
    {
        return $this->reviewRepository->delete($id);
    }

    public function getFeaturedReviews()
    {
        return $this->reviewRepository->getFeatured();
    }

    public function getReviewsByProduct(int $productId)
    {
        return $this->reviewRepository->getByProduct($productId);
    }

    public function getReviewsByArtist(int $artistId)
    {
        return $this->reviewRepository->getByArtist($artistId);
    }
}
