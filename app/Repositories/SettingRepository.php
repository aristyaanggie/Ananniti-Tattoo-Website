<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Setting;
use App\Repositories\Contracts\SettingRepositoryInterface;

class SettingRepository implements SettingRepositoryInterface
{
    public function __construct(
        protected Setting $model,
    ) {}

    public function getByKey(string $key)
    {
        return $this->model->where('key', $key)->first();
    }

    public function getByGroup(string $group)
    {
        return $this->model->where('group', $group)->get();
    }

    public function set(string $key, string $value)
    {
        return $this->model->updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    public function setMany(array $settings)
    {
        foreach ($settings as $key => $value) {
            $this->set($key, $value);
        }
    }
}
