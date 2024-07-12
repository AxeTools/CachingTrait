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

This project uses [Semantic Versioning][].  The project currently does not have a version that can be used for below 
php 7.0 however if someone out there has a need for a version to exist to support a lower version of php 
please contact me it is very easy to port the code to anything down to php 5.4 (the introduction of Traits in the 
language) and it would be easy to support.  If you need this functionality in a version of php before that you would 
have to create a base class from the trait file in the code.

## Installation

The preferred method of installation is via [Composer][]. Run the following command to install the package and add it as
a requirement to your project's `composer.json`:

```bash
composer require axetools/cachingtrait
```

## Usage

The CachingTrait can be used with any class and will expose several protected methods to be utilized by the class to access the static cache array.

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