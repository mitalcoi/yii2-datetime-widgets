<?php

namespace mitalcoi\widgets;

use yii\web\AssetBundle;

/**
 * Class MomentAsset
 *
 *
 * @see http://momentjs.com/
 */
class MomentAsset extends AssetBundle
{
	public function init()
	{
		parent::init();
		$this->sourcePath = __DIR__ . '/assets';
		$this->js = ['js/moment-with-langs.min.js'];
	}
}
