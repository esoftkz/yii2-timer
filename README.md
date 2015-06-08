Jquery Timer for Yii2
Renders a <a href="http://codepen.io/rendro/pen/qazCG">Timer</a> plugin widget.
-----------

Installation:

```php
"esoftkz/yii2-timer": "~1.0@dev"
```
-----------

Usage:

```php
use esoftkz\timer\Timer;

<?= Timer::widget([
	'clientOptions' => [
		'scaleColor' => false,
		'trackColor' => 'rgba(255,255,255,0.3)',
		'barColor' => '#E7F7F5',
		'lineWidth' => 6,
		'lineCap' => 'butt',
		'size' => 95
	],   
	'endTimeStamp' => '2015-06-23 21:00:00',
	'timezon' => 'Asia/Almaty'
]) ?>
```
