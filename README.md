XHP-JS Example
==============

This is a short example of xhp-js, using Composer and npm.

Prerequisites
-------------

Recent versions of:
 - HHVM
 - NodeJS
 - NPM

Installation
------------

```
$ wget https://getcomposer.org/composer.phar
$ hhvm composer.phar install
```

This will also execute `npm install` and `npm run build`; take a look at
`package.json` and `composer.json` for details. In short, it installs:

 - xhp-js (`vendor/`, `node_modules/`)
 - xhp-lib (`vendor/`)
 - React (`node_modules/`)
 - Browserify (`node_modules/`)

It also builds a bundle.js combining the external dependencies with the example
Javascript.
