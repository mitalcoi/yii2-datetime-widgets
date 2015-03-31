<?php

namespace mitalcoi\widgets;

use yii\web\AssetBundle;

/**
 * Class DatePickerAsset
 *
 */
class DatePickerAsset extends AssetBundle
{
	public function init()
    	{
        	parent::init();
        	$this->sourcePath = __DIR__ . '/assets';
    	}
    	public $js = [
		'js/bootstrap-datepicker.js',
		'js/bootstrap-datepicker.i18n.js',
	];
	public $css = [
		'css/bootstrap3-datepicker.css',
	];
	public $depends = [
        'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset',
	];
}
