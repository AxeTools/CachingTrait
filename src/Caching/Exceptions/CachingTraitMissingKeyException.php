<?php

namespace AxeTools\Traits\Caching\Exceptions;

use AxeTools\Traits\Caching\Exceptions\CachingTraitException;
use Throwable;

/**
 * Missing cache key exception
 */
class CachingTraitMissingKeyException extends CachingTraitException {

    public function __construct(string $key = "", int $code = 0, Throwable $previous = null) {
        parent::__construct("The cache key '{$key}' was not found in the cache", $code, $previous);
    }
}