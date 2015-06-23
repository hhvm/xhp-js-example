<?hh
/**
 * Copyright (c) 2015-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the same directory.
 */

require_once(__DIR__.'/vendor/autoload.php');

class :test extends :x:element {
  use XHPHelpers;
  use XHPJSCall;
  use XHPJSInstance;

  attribute :xhp:html-element;

  protected function render(): XHPRoot {
    /* Roughly equivalent to:
     *
     * var MyJSModule = require('MyJSModule');
     * MyJSModule.myJSFunction(
     *  'hello, world',
     *  <result of constructJSInstance() call below>
     * );
     *
     * The JS code realizes it needs to construct the JS class first, despite
     * the call below.
     */
    $this->jsCall(
      'MyJSModule',
      'myJSFunction',
      'hello, world.',
      XHPJS::Instance($this)
    );

    /*
     * var MyJSController = require('MyJSController');
     * new MyJSController(
     *   document.getElementById(< $this->getID() >);
     *   'herp derp'
     * );
     */
    $this->constructJSInstance(
      'MyJSController',
      XHPJS::Element($this),
      'herp derp',
    );

    return <div id={$this->getID()}>In :test::render()</div>;
  }
}

class :react-test extends :x:element {
  use XHPHelpers;
  use XHPReact;

  attribute
    :xhp:html-element,
    string some-attribute @required;

  protected function render(): XHPRoot {
    // Self-explanatory :)
    $this->constructReactInstance(
      'MyReactClass',
      Map {'someAttribute' => $this->:some-attribute }
    );
    return <div id={$this->getID()} />;
  }
}

$xhp =
  <html>
    <head>
      <script src="build/bundle.js" />
    </head>
    <body>
      <x:js-scope>
        <test />
        <react-test some-attribute="some value" />
      </x:js-scope>
    </body>
  </html>;
print $xhp;
