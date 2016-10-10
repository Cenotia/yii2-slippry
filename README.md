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
	cenotia\slippry\SlippryWidget::widget([
		'selector' => '#image_id',
		'pluginOptions' => [
			'aspectRatio' => 1,
			'minSize' => [50,50],
			'maxSize' => [200,200],
			'setSelect' => [10,10,40,40],
			'bgColor' => 'black',
			'bgOpacity' => '0.5',
			'onChange' => new yii\web\JsExpression('function(c){console.log(c.x);}')
		]
	]);
```

For complete documentation please refer to the [official Slippry page](http://slippry.com/settings/)

License
-------

**yii2-slippry** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.