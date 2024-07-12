<?php

namespace AxeTools\Traits\Test;

use AxeTools\Traits\Caching;
use PHPUnit\Framework\TestCase;

class CachingTraitTest extends TestCase {
    use Caching\CachingTrait;

    /**
     * @test
     * @dataProvider setCacheTestDataProvider
     *
     * @param array<string> $key
     * @param mixed $value
     *
     * @return void
     * @throws Caching\Exception\CachingTraitMissingKeyException
     */
    public function setCacheTest(array $key, mixed $value) {
        self::setCache($key, $value);
        $this->assertTrue(self::hasCache($key));
        $this->assertEquals($value, self::getCache($key));

        /* Clean up */
        self::clearCache();
    }

    /**
     * @test
     *
     * @return void
     * @throws Caching\Exception\CachingTraitMissingKeyException
     */
    public function clearCacheTest() {
        self::setCache(['test'], 'This is a test cache');
        $this->assertTrue(self::hasCache(['test']));
        self::clearCache();
        $this->assertFalse(self::hasCache(['test']));
    }

    /**
     * @test
     *
     * @return void
     */
    public function hasCacheFailTest()
    {
        self::setCache(['test'], 'This is a test cache');
        $this->assertTrue(self::hasCache(['test']));
        $this->expectException(Caching\Exception\CachingTraitMissingKeyException::class);
        $this->expectExceptionMessage("The cache key 'key_not_here' was not found in the cache");
        self::getCache(['key_not_here']);

        /* Clean up */
        self::clearCache();
    }

    /**
     * @test
     *
     * @return void
     * @throws Caching\Exception\CachingTraitMissingKeyException
     */
    public function clearCacheFailTest() {
        self::setCache(['test'], 'This is a test cache');
        $this->assertTrue(self::hasCache(['test']));
        $this->expectException(Caching\Exception\CachingTraitMissingKeyException::class);
        $this->expectExceptionMessage("The cache key 'key_not_here' was not found in the cache");
        self::clearCache(['key_not_here']);

        /* Clean up */
        self::clearCache();
    }

    /**
     * @test
     *
     * @return void
     * @throws Caching\Exception\CachingTraitMissingKeyException
     */
    public function setCacheChangeTest() {
        /* set a value to the ['test'] key */
        self::setCache(['test'], 'This is a test cache');
        $this->assertTrue(self::hasCache(['test']));
        $this->assertEquals('This is a test cache', self::getCache(['test']));

        /* set a new value to the ['test'] key */
        self::setCache(['test'], ['test' => 'This is a test cache']);
        $this->assertTrue(self::hasCache(['test']));
        $this->assertEquals(['test' => 'This is a test cache'], self::getCache(['test']));

        /* check clearing the ['test'] key */
        self::clearCache(['test']);
        $this->assertFalse(self::hasCache(['test']));

        /* Clean up */
        self::clearCache();
    }

    /**
     * @return array<mixed>
     */
    public static function setCacheTestDataProvider(): array {
        return [
            'null pass through' => [['test'], null],
            'int pass through' => [['test'], 1],
            'string pass through' => [['test'], 'string'],
            'bool pass through true ' => [['test'], true],
            'boll pass through false' => [['test'], false],
        ];
    }

}
