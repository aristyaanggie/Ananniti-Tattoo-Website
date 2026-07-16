<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Contracts\SectionRepositoryInterface;

class LandingPageService
{
    public function __construct(
        protected SectionRepositoryInterface $sectionRepository,
    ) {}

    public function getAllSections()
    {
        return $this->sectionRepository->all();
    }

    public function getSectionBySlug(string $slug)
    {
        return $this->sectionRepository->findBySlug($slug);
    }

    public function getHeroSection()
    {
        return $this->sectionRepository->findBySlug('hero');
    }

    public function getAboutSection()
    {
        return $this->sectionRepository->findBySlug('about');
    }

    public function getServicesSection()
    {
        return $this->sectionRepository->findBySlug('services');
    }

    public function updateSection(int $id, array $data)
    {
        return $this->sectionRepository->update($id, $data);
    }
}
