<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface SettingRepositoryInterface
{
    public function getByKey(string $key);
    public function getByGroup(string $group);
    public function set(string $key, string $value);
    public function setMany(array $settings);
}
