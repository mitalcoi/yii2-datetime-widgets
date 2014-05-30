<?php

namespace zhuravljov\widgets;

use yii\web\AssetBundle;

/**
 * Class DateRangePickerAsset
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class DateRangePickerAsset extends AssetBundle
{
	public function init()
    	{
        	parent::init();
        	$this->sourcePath = __DIR__ . '/assets';
    	}	public $js = [
		'js/bootstrap-daterangepicker.js'
	];
	public $css = [
		'css/bootstrap3-daterangepicker.css',
	];
	public $depends = [
		'yii\web\JqueryAsset',
		'yii\bootstrap\BootstrapAsset',
		'zhuravljov\widgets\MomentAsset',
	];
}
