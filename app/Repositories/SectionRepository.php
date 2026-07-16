<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Section;
use App\Repositories\Contracts\SectionRepositoryInterface;

class SectionRepository implements SectionRepositoryInterface
{
    public function __construct(
        protected Section $model,
    ) {}

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function findBySlug(string $slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $section = $this->model->find($id);
        if ($section) {
            $section->update($data);
        }
        return $section;
    }

    public function delete(int $id)
    {
        $section = $this->model->find($id);
        if ($section) {
            $section->delete();
        }
        return $section;
    }
}
