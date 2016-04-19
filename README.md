# phpmyadmin-coding-standard

phpMyAdmin PHP CodeSniffer Coding Standard


## Installation & Usage

Before starting using our coding standard install [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).

Clone or download this repo somewhere on your computer or install it with [Composer](http://getcomposer.org/).
To do so, add the dependency to your `composer.json` file by running `composer require magento-ecg/coding-standard`.

Add the standards directory to PHP_CodeSniffer installed paths:

```sh
$ phpcs --config-set installed_paths ./vendor/phpmyadmin/coding-standard
```

Run CodeSniffer:

```sh
$ phpcs --standard=PMAStandard /path/to/code
```
