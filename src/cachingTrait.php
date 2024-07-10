<?php

namespace AxeTools\cachingTrait;
use AxeTools\cachingTrait\Exceptions\CachingTraitMissingKeyException;

/**
 * The cachingTrait adds both an internal static cache to the class and a set of methods for caching, checking,
 * accessing and clearing items from that internal cache.
 *
 * Be careful when generating keys that could possibly collide in different instances, be as granular as possible when
 * creating cache keys.
 *
 * Be careful when performing tests that utilize caching classes, these caches should be cleared at each tests::setUp()
 * method as well as at each tests::tearDown() method to ensure each test is entered as an independent fully functioning
 * test.
 *
 * All methods in the trait are protected, internal cache states should only be handled in a controlled method through
 * the implementing class and never externally by the user land.
 */
trait cachingTrait
{

    /**
     * @var array<string, mixed>
     */
    protected static $_cache = [];

    /**
     * Add the data to the cache array under the key value
     *
     * @param array<string> $key
     * @param mixed $data
     * @return void
     */
    protected static function setCache(array $key, $data) {
        self::$_cache[self::generateKey($key)] = $data;
    }

    /**
     * @param array<string> $key
     * @return mixed
     * @throws CachingTraitMissingKeyException if provided key has no cache value
     */
    protected static function getCache(array $key) {
        if (self::hasCache($key)) return self::$_cache[self::generateKey($key)];
        throw new CachingTraitMissingKeyException('Invalid cache key, cache key not set');
    }

    /**
     * Return if the class cache has the passed key in it
     *
     * @param array<string> $key
     * @return bool
     */
    protected static function hasCache(array $key): bool {
        return array_key_exists(self::generateKey($key), self::$_cache);
    }

    /**
     * Generate a key value from the array values
     *
     * @param array<string> $key_items
     * @return string
     */
    private static function generateKey(array $key_items): string {
        return implode(':|:', $key_items);
    }

    /**
     * Clear the class cache
     *
     * @return void
     */
    protected static function clearCache() {
        self::$_cache = [];
    }
}