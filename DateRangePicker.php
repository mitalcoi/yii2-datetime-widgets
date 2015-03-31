<?php

namespace mitalcoi\widgets;

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use yii\web\JsExpression;

/**
 * Class DateRangePicker
 *
 */
class DateRangePicker extends InputWidget
{
    public $ranges = [];
    public $format='DD.MM.YYYY';
    public $separator=' - ';
    public $locale = [
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
        ]
    ];
    /**
     * @var array the HTML attributes for the input tag.
     */
    public $options = [
        'class' => 'form-control'
    ];
    /**
     * @var array options for daterangepicker
     */
    public $clientOptions = [];

    public function init()
    {
        parent::init();
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->hasModel() ? Html::getInputId($this->model,
                $this->attribute) : $this->getId();
        }
        $this->clientOptions['locale']=$this->locale;
        $this->clientOptions['format']=$this->format;
        $this->clientOptions['separator']=$this->separator;
        $this->clientOptions['firstDay']=0;
        if (!$this->ranges) {
            $this->clientOptions['ranges'] = [
                'Today' => [
                    new JsExpression('moment()'),
                    new JsExpression('moment()'),
                ],
                'Yesterday' => [
                    new JsExpression('moment().subtract("days", 1)'),
                    new JsExpression('moment()'),
                ],
                'Last week' => [
                    new JsExpression('moment().subtract("days", 7)'),
                    new JsExpression('moment()'),
                ],
                'Last month' => [
                    new JsExpression('moment().subtract("days", 30)'),
                    new JsExpression('moment()'),
                ],
                'Last year' => [
                    new JsExpression('moment().subtract("days", 360)'),
                    new JsExpression('moment()'),
                ]
            ];
        }else{
            $this->clientOptions['ranges']=$this->ranges;
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
