# phpMyAdmin Coding Standard

phpMyAdmin Coding Standard for PHP CodeSniffer.

## Installation & Usage

### Manual installation
Before starting using our coding standard install [PHP_CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer).

Clone or download this repo somewhere on your computer or install it with [Composer](https://getcomposer.org/).
To do so, add the dependency to your `composer.json` file by running `composer require --dev phpmyadmin/coding-standard`.

### Automatic installation with Composer
Much easier, however, is to use Composer to install the necessary files automatically.
Using the development version of phpMyAdmin from git requires using Composer, so the dependencies are already set
in `composer.json` using the 'require-dev' section. Depending on your system, this will either be installed
automatically unless you use `--no-dev` option or composer must be run with `--dev`. Regardless of your composer
version, using `--dev` will always install the 'require-dev' dependencies, so we recomment using Composer with that
option.

### Final configuration
Add the standards directory to PHP_CodeSniffer installed paths. You probably have to use the full/absolute path
rather than a relative one, otherwise you will get an "Unexpected Value Exception":

```sh
$ phpcs --config-set installed_paths /var/www/html/phpmyadmin/vendor/phpmyadmin/coding-standard
```

You can verify whether the standard can be found:

```sh
$ phpcs -i
The installed coding standards are MySource, PSR1, PHPCS, Zend, Squiz, PEAR, PSR2 and PMAStandard
```

Run CodeSniffer:

```sh
$ phpcs --standard=PMAStandard /path/to/code
```

You can optionally make PMAStandard the default for all invocations of phpcs, then you don't need to
manually specify it each time on the command line:

```sh
$ phpcs --config-set default_standard PMAStandard
```

## Using

PMAStandard has its tuned coding style checks, such as missing `@author`,
`@copyright`, `@link` or other tags. Let's take a look at an example, checked with PMAStandard:

```sh
$ phpcs --standard=PMAStandard /path/to/code/myfile.php
123 | WARNING | Line exceeds 85 characters; contains 139 characters
184 | ERROR   | Line indented incorrectly; expected at least 20 spaces, found
    |         | 16
272 | ERROR   | Closing parenthesis of a multi-line IF statement must be on a
    |         | new line
272 | ERROR   | Multi-line IF statement not indented correctly; expected 12
    |         | spaces but found 9
```
