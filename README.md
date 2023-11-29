# QR code generator for the Booosta Framework

This modules provides a QR code generator for PHP Booosta.

Booosta allows to develop PHP web applications quick. It is mainly designed for small web applications.
It does not provide a strict MVC distinction. Although the MVC concepts influence the framework. Templates,
data objects can be seen as the Vs and Ms of MVC.

Up to version 3 Booosta was available at Sourceforge: https://sourceforge.net/projects/booosta/ From version
4 on it resides on Github and is available from Packagist under booosta/booosta .

## Installation

As this is a module for the Booosta framework, you have to have this framework installed first. See the
[installation instructions](https://github.com/buzanits/booosta-installer) for accomplishing this. If your
Booosta is installed, you can install this module with

```
composer require booosta/qrcode
```

## Usage

In your scripts you use the module:

```
# [...]
$qrcoder = $this->makeInstance('Qrcode', 'https://www.kernel.org');
$qrcoder->save_file('myqrcode.png');
```

Then you find the file `myqrcode.png` in your web root. Of course you can save the file in a subdirectory. If
you want to show the QR code on your website use the following:

```
# myscript.php
$qrcoder = $this->makeInstance('Qrcode', 'https://www.kernel.org');
$qrcoder->show_js('mycode');

# myscript.tpl
<div id="mycode"></div>
```
