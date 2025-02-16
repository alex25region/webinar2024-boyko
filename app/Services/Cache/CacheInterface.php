<?php

namespace App\Services\Cache;

interface CacheInterface
{
    public function get(string $key, mixed $defaultValue = null): mixed;

    public function set(string $key, mixed $value, int $ttl): void;

    public function delete(string $key): bool;

    public function has(string $key): bool;

}
