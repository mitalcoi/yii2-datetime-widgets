Datetime widgets for Yii2
=========================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Add

```
"mitalcoi/yii2-datetime-widgets" : "dev-master"
```

to the require section of your application's `composer.json` file.

DatePicker
----------

[Demo](http://eternicode.github.io/bootstrap-datepicker/) from the bootstrap-datepicker plugin website.

### Usage

```php
use mitalcoi\widgets\DatePicker;
```

```php
<?= $form->field($model, 'attribute')->widget(DatePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'format' => 'dd.mm.yyyy',
        'language' => 'ru',
        'autoclose' => true,
        'todayHighlight' => true,
    ],
]) ?>
```

For more details, please check the [bootstrap-datepicker plugin](http://bootstrap-datepicker.readthedocs.org/en/latest/) website.

DateTimePicker
--------------

[Demo](http://www.malot.fr/bootstrap-datetimepicker/demo.php) from the bootstrap-datetimepicker plugin website.


### Usage

```php
use mitalcoi\widgets\DateTimePicker;
```

```php
<?= $form->field($model, 'attribute')->widget(DateTimePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'format' => 'dd.mm.yyyy hh:ii',
        'language' => 'ru',
        'autoclose' => true,
    ],
]) ?>
```

For more details, please check the [bootstrap-datetimepicker plugin](http://www.malot.fr/bootstrap-datetimepicker/index.php) website.

DateRangePicker
---------------

[Demo](http://www.dangrossman.info/2012/08/20/a-date-range-picker-for-twitter-bootstrap/) from the bootstrap-daterangepicker plugin website.

### Usage

```php
use mitalcoi\widgets\DateRangePicker;
```

```php
<?= $form->field($model, 'actual_time')->widget(DateRangePicker::className(), [
    'options' => ['class' => 'form-control'],
    'clientOptions' => [
        'ranges' => [
            'Today' => [
                new JsExpression('moment()'),
                new JsExpression('moment()'),
            ],
            'Yesterday' => [
                new JsExpression('moment().subtract("days", 1)'),
                new JsExpression('moment().subtract("days", 1)'),
            ],
        ],
        'format' => 'DD.MM.YYYY',
        'separator' => ' - ',
    ],
]) ?>
```

For more details, please check the [bootstrap-daterangepicker plugin](https://github.com/dangrossman/bootstrap-daterangepicker) repo.
