<?php

namespace AxeTools\Traits\Caching;

use AxeTools\Traits\Caching\Exception;

/**
 * The CachingTrait adds both an internal static cache to the class and a set of methods for caching, checking,
 * accessing and clearing items from that internal cache.
 *
 * Be careful when generating keys that could possibly collide in different instances, be as granular as possible when
 * creating cache keys.  If you are extending classes and include the CacheTrait in a parent class you may want to
 * include the get_called_class() output the array key to ensure unique cache keys.
 *
 * Be careful when performing tests that utilize caching classes, these caches should be cleared at each tests::setUp()
 * method as well as at each tests::tearDown() method to ensure each test is entered as an independent fully functioning
 * test.
 *
 * All methods in the trait are protected, internal cache states should only be handled in a controlled method through
 * the implementing class.  Each usage can determine the visibility and accessibility that any cache manipulation can have.
 */
trait CachingTrait {

    /**
     * @var array<string, mixed>
     */
    protected static $_cache = [];

    /**
     * Add the data to the cache array under the key value
     *
     * @param array<string> $key an array of strings to generate a unique key for the stored data
     * @param mixed         $data
     *
     * @return void
     */
    protected static function setCache(array $key, $data) {
        self::$_cache[self::generateKey($key)] = $data;
    }

    /**
     * Get the data that is stored in the cache array under the key value.
     *
     * @param array<string> $key
     *
     * @return mixed
     * @throws Exception\CachingTraitMissingKeyException if provided key is not set in the cache array
     */
    protected static function getCache(array $key) {
        if (self::hasCache($key)) return self::$_cache[self::generateKey($key)];
        throw new Exception\CachingTraitMissingKeyException(self::generateKey($key));
    }

    /**
     * Return if the class cache has the passed key in it
     *
     * @param array<string> $key
     *
     * @return bool
     */
    protected static function hasCache(array $key): bool {
        return array_key_exists(self::generateKey($key), self::$_cache);
    }

    /**
     * Generate a key value from the array values
     *
     * @param array<string> $key_items
     *
     * @return string
     */
    private static function generateKey(array $key_items): string {
        return implode(':|:', $key_items);
    }

    /**
     * Clear the class cache, either a single key position or the entire cache array
     *
     * @param null|array<string> $key optional key to clear from the cache, if omitted the entire cache is cleared
     *
     * @return void
     * @throws Exception\CachingTraitMissingKeyException if provided key is not set in the cache array
     */
    protected static function clearCache(array $key = null) {
        if(null === $key) {
            self::$_cache = [];
        } else {
            if(!self::hasCache($key)) throw new Exception\CachingTraitMissingKeyException(self::generateKey($key));
            unset(self::$_cache[self::generateKey($key)]);
        }
    }
}