<?php
namespace cenotia\slippry;

use yii\web\AssetBundle;

/**
 *
 * @author xavier <xavier.villamuera@gmail.com>
 */
class SlippryAsset extends AssetBundle
{

	public $css = [
		'css/slippry.css'
	];

	public $js = [
		'js/slippry.min.js'
	];

	public $depends = [
		'yii\web\JqueryAsset'
	];

	public function init()
	{
		$this->sourcePath = __DIR__ . '/assets';
		return parent::init();
	}
}
