<?php

namespace AxeTools\tests;

use AxeTools\cachingTrait\cachingTrait;
use AxeTools\cachingTrait\Exceptions\CachingTraitMissingKeyException;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class CachingTraitTest extends TestCase
{
    use cachingTrait;

    /**
     * @param array<string> $key
     * @param mixed $value
     * @return void
     * @throws CachingTraitMissingKeyException
     */
    #[Test]
    #[DataProvider('setCacheTestDataProvider')]
    public function setCacheTest(array $key, $value) {
        self::setCache($key, $value);
        $this->assertTrue(self::hasCache($key));
        $this->assertEquals($value, self::getCache($key));
    }

    /**
     * @return array<mixed>
     */
    public static function setCacheTestDataProvider(): array {
        return [
            'null pass through' => [ ['test'], null ],
            'int pass through' => [ ['test'], 1 ],
            'string pass through' => [ ['test'], 'string' ],
            'bool pass through true ' => [ ['test'], true ],
            'boll pass through false' => [ ['test'], false ],
        ];
    }

}
