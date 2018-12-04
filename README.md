Form Extensions
===============
[![Latest Stable Version](https://poser.pugx.org/core23/form-extensions/v/stable)](https://packagist.org/packages/core23/form-extensions)
[![Latest Unstable Version](https://poser.pugx.org/core23/form-extensions/v/unstable)](https://packagist.org/packages/core23/form-extensions)
[![License](https://poser.pugx.org/core23/form-extensions/license)](LICENSE.md)

[![Total Downloads](https://poser.pugx.org/core23/form-extensions/downloads)](https://packagist.org/packages/core23/form-extensions)
[![Monthly Downloads](https://poser.pugx.org/core23/form-extensions/d/monthly)](https://packagist.org/packages/core23/form-extensions)
[![Daily Downloads](https://poser.pugx.org/core23/form-extensions/d/daily)](https://packagist.org/packages/core23/form-extensions)

[![Build Status](https://travis-ci.org/core23/form-extensions.svg)](http://travis-ci.org/core23/form-extensions)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/core23/form-extensions/badges/quality-score.png)](https://scrutinizer-ci.com/g/core23/form-extensions/)
[![Code Climate](https://codeclimate.com/github/core23/form-extensions/badges/gpa.svg)](https://codeclimate.com/github/core23/form-extensions)
[![Coverage Status](https://coveralls.io/repos/core23/form-extensions/badge.svg)](https://coveralls.io/r/core23/form-extensions)

This library adds some custom form elements and validation for symfony.

## Installation

Open a command console, enter your project directory and execute the following command to download the latest stable version of this library:

```
composer require core23/form-extensions
```

### Assets

It is recommended to use [webpack](https://webpack.js.org/) / [webpack-encore](https://github.com/symfony/webpack-encore) 
to include the `Select2Autocomplete.js` file in your page. These file is located in the `assets` folder.

## Symfony usage

If you want to use this library inside symfony, you can use a bridge.

### Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles in `bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Core23\Form\Bridge\Symfony\Bundle\Core23FormBundle::class => ['all' => true],
];
```

## License

This library is under the [MIT license](LICENSE.md).
