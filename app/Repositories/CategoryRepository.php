<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function __construct(
        protected Category $model,
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
        $category = $this->model->find($id);
        if ($category) {
            $category->update($data);
        }
        return $category;
    }

    public function delete(int $id)
    {
        $category = $this->model->find($id);
        if ($category) {
            $category->delete();
        }
        return $category;
    }

    public function getByType(string $type)
    {
        return $this->model->where('type', $type)->get();
    }
}
