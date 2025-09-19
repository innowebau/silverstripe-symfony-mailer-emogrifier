# Silverstripe Symfony Mailer Emogrifier

[![Version](http://img.shields.io/packagist/v/innoweb/silverstripe-symfony-mailer-emogrifier.svg?style=flat-square)](https://packagist.org/packages/innoweb/silverstripe-symfony-mailer-emogrifier)
[![License](http://img.shields.io/packagist/l/innoweb/silverstripe-symfony-mailer-emogrifier.svg?style=flat-square)](license.md)

## Overview

Easily integrate [Emogrifier](https://github.com/MyIntervals/emogrifier) into Silverstripe and send Emails with inlined CSS automatically.

This is based on [bummzack/silverstripe-emogrify](https://github.com/bummzack/silverstripe-emogrify), integrating Emogrifier with Symfony Mailer.

## Requirements

* Silverstripe Framework ^6
* [Emogrifier](https://github.com/MyIntervals/emogrifier) ^8

## Installation

Install the module using composer:
```
composer require innoweb/silverstripe-symfony-mailer-emogrifier dev-master
```
Then run dev/build.

## Configuration

By default, the plugin will inline CSS that is part of the HTML, eg. styles defined in `<style>` tags.

You can also supply a global css file via config:

```yml
Innoweb\SymfonyMailerEmogrifier\Extensions\MailerSubscriberExtension:
  css_file: 'public/_resources/themes/yourtheme/css/email.css'
```

Please note that if the path to the CSS file is not absolute, it will be considered to be *relative* to the `BASE_PATH`!

## License

BSD 3-Clause License, see [License](license.md)
