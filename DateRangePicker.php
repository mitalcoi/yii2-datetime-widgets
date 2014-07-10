<?php

namespace zhuravljov\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

/**
 * Class DateRangePicker
 *
 * @author Roman Zhuravlev <zhuravljov@gmail.com>
 */
class DateRangePicker extends InputWidget
{
	/**
	 * @var array the HTML attributes for the input tag.
	 */
	public $options = [];
	/**
	 * @var array options for daterangepicker
	 */
	public $clientOptions = [
		'format' => 'DD.MM.YYYY',
		'separator' => ' - ',
		'locale' => [
	                'applyLabel' => 'Apply',
	                'cancelLabel' => 'Reset',
	                'fromLabel' => 'From',
	                'toLabel' => 'To',
	                'weekLabel' => 'W',
	                'customRangeLabel' => 'Custom Range',
	                'daysOfWeek' => ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
	                'monthNames' => [
	                    'Jan',
	                    'Feb',
	                    'Mar',
	                    'Apr',
	                    'May',
	                    'Jun',
	                    'Jul',
	                    'Aug',
	                    'Sep',
	                    'Oct',
	                    'Nov',
	                    'Dec'
                ],
                'firstDay' => 0
         ];

	public function init()
	{
		parent::init();
		if (!isset($this->options['id'])) {
			$this->options['id'] = $this->hasModel() ? Html::getInputId($this->model, $this->attribute) : $this->getId();
		}
	}

	public function run()
	{
		if ($this->hasModel()) {
			echo Html::activeTextInput($this->model, $this->attribute, $this->options);
		} else {
			echo Html::textInput($this->name, $this->value, $this->options);
		}
		/** @var \yii\web\View $view */
		$view = $this->getView();
		DateRangePickerAsset::register($view);
		$id = $this->options['id'];
		$options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
		$view->registerJs("jQuery('#$id').daterangepicker($options);");
	}
}
