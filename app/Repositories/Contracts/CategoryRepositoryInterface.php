<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function all();
    public function find(int $id);
    public function findBySlug(string $slug);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function getByType(string $type);
}
