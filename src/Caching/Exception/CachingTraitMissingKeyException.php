<?php

namespace AxeTools\Traits\Caching\Exception;

/**
 * Missing cache key exception
 */
class CachingTraitMissingKeyException extends CachingTraitException {

    public function __construct($key = "", $code = 0, $previous = null) {
        parent::__construct("The cache key '{$key}' was not found in the cache", $code, $previous);
    }
}