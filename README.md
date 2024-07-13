<h1 align="center">AxeTools/CachingTrait</h1>

<p align="center">
    <strong>This is a php class trait that will enable static caching on a class.</strong>
</p>

<p align="center">
    <a href="https://github.com/AxeTools/CachingTrait"><img src="https://img.shields.io/badge/source-AxeTools/cachingTrait-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/AxeTools/CachingTrait.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/AxeTools/CachingTrait/blob/1.x/LICENSE"><img src="https://img.shields.io/packagist/l/AxeTools/CachingTrait.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/AxeTools/CachingTrait/actions/workflows/php.yml"><img src="https://img.shields.io/github/actions/workflow/status/AxeTools/CachingTrait/php.yml?branch=1.x&logo=github&style=flat-square" alt="Build Status"></a>
</p>

## Disclaimer
>
> In general this does not promote good design patters.  This is not a good package to include when creating a new project.  The power of this package is having the ability to drop it into heavy classes that are difficult to refactor.

>
> This package can greatly reduce execution times for classes that are instantiated in multiple locations that are heavy to create or have multiple database calls on instantiation.  Classes that contain data that is not expected to change in the lifetime of a request.  Sometimes it is not possible to pass these classes as a dependency when refactoring and an intermediary solution is needed.

>
> <b>WARNING:</b> When writing tests that involve caching classes, remember the static cache is not automatically reset between tests.  Care should be taken to ensure clean class caches at the start and end of each test case.

This project uses [Semantic Versioning][].

## Installation

The preferred method of installation is via [Composer][]. Run the following command to install the package and add it as
a requirement to your project's `composer.json`:

```bash
composer require axetools/cachingtrait
```

## Usage

The CachingTrait can be used with any class and will expose several protected methods to be utilized by the class to access the static cache array.

### Example
```php
<?php
namespace test

use AxeTools\Trait\Caching\CachingTrait;

class HardToBuild {

use CachingTrait;

    /**
     * @param array<string> $parameters Assumes that the parameters alone can uniquely recall the same object.
     */
    public static function create(array $parameters){
        if(self::hasCache(parameters)) return self::getCache($parameters);
        return new self($parameters);
    }
    
}
```

### setCache()

The `self::setCache()` static method to store data in the internal cache array.  There is no protection to stop 
array keys from being overwritten.  If you need to ensure you are not overwriting data utilize the `self::hasCache()
` check to see if there is already data being stored for that key before setting the keys data.

#### Description
```php
self::setCache(array<string> $key, mixed $data): void
```

#### Parameters
<dl>
<dt>key</dt>
<dd>The string array that will be used to identify the data that is being stored in the cache</dd>

<dt>data</dt>
<dd>The data that will be stored in the cache</dd>
</dl>

#### Return Value
This method has no return

### hasCache()

The `self::hasCache()` static method is used to see if there is already a key value stored in the cache array. Since 
anything can be stored in the cache array for a given key, only the existence of the give key in the cache 
array is checked with no consideration to the data stored for the key.

#### Description
```php
self::hasCache(array<string> $key): bool
```

#### Parameters
<dl>
<dt>key</dt>
<dd>The string array that will be used to check for the data that is being stored in the cache</dd>
</dl>

#### Return Value

This will return `true` if the key is found in the cache array and `false` if not found.

### getCache()

The `self::getCache()` static method is used to retrieve the data stored in the cache assigned to the key specified. 
If the key is not defined in the cache array a `CachingTraitMissingKeyException` will be thrown.

#### Description
```php
self::getCache(array<string> $key): mixed
```

#### Parameters
<dl>
<dt>key</dt>
<dd>The string array that will be used return the data that is being stored in the cache for that key</dd>
</dl>

#### Return Value

This will return the value stored in the cache for the key provided.  If the key is not defined in the cache array a 
`CachingTraitMissingKeyException` will be thrown.

### clearCache()
#### Description
```php
self::clearCache(array<string> $key): void
```

#### Parameters
<dl>
<dt>key</dt>
<dd>Optional string array that will be used to clear the data and the key that is stored in the cache.  If omitted 
the entire cache array is cleared.</dd>
</dl>

#### Return Value
If the key is not defined in the cache array a `CachingTraitMissingKeyException` will be thrown.

[composer]: http://getcomposer.org/
[semantic versioning]: https://semver.org/spec/v2.0.0.html