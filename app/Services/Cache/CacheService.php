<?php

namespace App\Services\Cache;

use Illuminate\Contracts\Cache\Factory as CacheFactory;

final readonly class CacheService implements CacheInterface
{

    public function __construct(
        private readonly CacheFactory $cache,
        private readonly string       $driver
    )
    {
    }

    public function get(string $key, mixed $defaultValue = null): mixed
    {
        return $this->cache->store($this->driver)->get($key, $defaultValue);
    }

    public function set(string $key, mixed $value, int $ttl): void
    {
        $this->cache->store($this->driver)->put($key, $value, $ttl);
    }

    public function delete(string $key): bool
    {
        return $this->cache->store($this->driver)->forget($key);
    }

    public function has(string $key): bool
    {
        return $this->cache->store($this->driver)->has($key);
    }

}
