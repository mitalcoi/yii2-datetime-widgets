<?php

namespace mitalcoi\widgets;

use yii\web\AssetBundle;

/**
 * Class DateTimePickerAsset
 *
 */
class DateTimePickerAsset extends AssetBundle
{
	public $js = [
		'js/bootstrap-datetimepicker.js',
		'js/bootstrap-datetimepicker.i18n.js',
	];
	public $css = [
		'css/bootstrap3-datetimepicker.css',
	];
	public $depends = [
        'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset',
	];
	public function init()
    	{
        	parent::init();
        	$this->sourcePath = __DIR__ . '/assets';
    	}
}
