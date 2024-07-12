<h1 align="center">AxeTools/CachingTrait</h1>

<p align="center">
    <strong>This is a php class trait that will enable static caching on a class.</strong>
</p>

<p align="center">
    <a href="https://github.com/AxeTools/CachingTrait"><img src="https://img.shields.io/badge/source-AxeTools/cachingTrait-blue.svg?style=flat-square" alt="Source Code"></a>
    <a href="https://php.net"><img src="https://img.shields.io/packagist/php-v/ryanwhowe/dot.svg?style=flat-square&colorB=%238892BF" alt="PHP Programming Language"></a>
    <a href="https://github.com/AxeTools/CachingTrait/blob/3.x/LICENSE"><img src="https://img.shields.io/packagist/l/ryanwhowe/dot.svg?style=flat-square&colorB=darkcyan" alt="Read License"></a>
    <a href="https://github.com/AxeTools/CachingTrait/actions/workflows/php.yml"><img src="https://img.shields.io/github/actions/workflow/status/ryanwhowe/dot/php.yml?branch=1.x&logo=github&style=flat-square" alt="Build Status"></a>
</p>

## Disclaimer
>
> In general this does not promote good design patters.  This is not a good package to include when creating a new project.  The power of this package is having the ability to drop it into heavy classes that are difficult to refactor.

## Installation

The preferred method of installation is via [Composer][]. Run the following command to install the package and add it as
a requirement to your project's `composer.json`:

```bash
composer require axetools/cachingtrait
```

## Usage

The CachingTrait can be used with any class and will expose several protected methods to be utilized by the class to access the static cache array.

### setCache()

### hasCache()

### getCache()

### clearCache()

[composer]: http://getcomposer.org/
[semantic versioning]: https://semver.org/spec/v2.0.0.html