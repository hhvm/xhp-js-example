XHP-JS Example
==============

This is a short example of xhp-js, using Composer and npm. The following
are demonstrated:

 - `XHPJS::Instance()`
 - `XHPJS::Element()`
 - `jsCall()`
 - `constructJSInstance()`
 - `constructReactInstance()`

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

Running under HHVM 3.8 or better
--------------------------------

Configure your webserver to serve this directory via HHVM+FastCGI, or,
alternatively:

```
$ hhvm -m server -d hhvm.server.type=proxygen -p 8080
```

Then open http://localhost:8080/example.php in your web browser.

Running under HHVM 3.6 or 3.7
-----------------------------

Configure your webserve to serve this directory via HHVM+FastCGI. Documentation
is available here:

https://github.com/facebook/hhvm/wiki/FastCGI
