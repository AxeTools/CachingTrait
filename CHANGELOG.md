# AxeTools/CachingTrait Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog]
and this project adheres to [Semantic Versioning].

## [Unreleased]

### Changed

- The 2.x branch will be added to support php ^8.0

## 2.0.0

### Added

- Initial release 2.0.0 ([#4])
- Updated required php version to ^8.0
- Added return type of `void` to `setCache()` method ([#4])
- Added type `mixed` to `$data` parameter of `setCache()` method ([#4])
- Added return type `mixed` to `getCache()` method ([#4])
- Added return type `void` to `clearCache()` method ([#4])


## 1.0.1 - 2024-07-29

## Fixed

- version number of `composer.json` corrected to reflect release version ([#5])

## 1.0.0 - 2024-07-29

### Added

- Initial Release 1.0.0 ([#2])
- Support for php ^7.0
- `CacheTrait::setCache()` static method ([#2])
- `CacheTrait::getCache()` static method ([#2])
- `CacheTrait::hasCache()` static method ([#2])
- `CacheTrait::generateKey()` static method ([#2])
- `CacheTrait::clearCache()` static method ([#2])

[Keep a Changelog]:http://keepachangelog.com/en/1.1.0/
[Semantic Versioning]:http://semver.org/spec/v2.0.0.html
[#2]:https://github.com/AxeTools/CachingTrait/pull/2
[#4]:https://github.com/AxeTools/CachingTrait/pull/4
[#5]:https://github.com/AxeTools/CachingTrait/pull/5
