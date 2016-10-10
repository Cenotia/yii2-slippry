Slippry Yii2 Extension
====================
This yii2 extension is a wrapper for the jQuery Slippry Slider
[Slippry](http://slippry.com/)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist cenotia/yii2-slippry "*"
```

or add

```
"cenotia/yii2-slipry": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
	echo cenotia\slippry\SlippryWidget::widget([
     'selector' => '#head_slidder',
     'pluginOptions' => [
         'responsive' => 1,
         'pager' => 1,
         'kenZoom' => 120,
         'onSliderLoad' => new yii\web\JsExpression('function(c){console.log("slider is loading ");}')
      ]
  ]);
```

For complete documentation please refer to the [official Slippry page](http://slippry.com/settings/)

License
-------

**yii2-slippry** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.