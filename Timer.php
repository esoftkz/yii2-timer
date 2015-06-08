<?php
namespace esoftkz\timer;

use yii\helpers\Html;
use yii\base\Widget;
use yii\helpers\Json;
use yii\base\InvalidConfigException;



class Timer extends Widget
{
	
    public $endTimeStamp;
    
	public $timezon;
	
    public $clientOptions = [];
     
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
		
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
		
		date_default_timezone_set( $this->timezon );			
		$endTimeStamp = strtotime($this->endTimeStamp);
		$startTimeStamp = strtotime(date("Y-m-d H:i:s"));
		$timeDiff = ($endTimeStamp - $startTimeStamp) > 0 ? $endTimeStamp - $startTimeStamp : 0;
		
		$numberDays = intval($timeDiff/86400);  // 86400 seconds in one day
		$dayWord = $numberDays>4?"дней":$numberDays>1?'дня':$numberDays>0?'день':"дней";
		
		
		
		$numberHours = intval($timeDiff%86400/3600); 
		$hourWord = $numberHours>4?"часов":$numberHours>1?"часа":$numberHours>0?'час':"часов";
		
		$numberMin = intval($timeDiff%86400%3600/60);
		$minWord = $minWord>4?"минут":$minWord>1?"минуты":$minWord>0?'минута':"минут";
		
	
        echo '<ul>
		  <li class="chart" data-percent="'.($numberDays/30*100).'"><span>'.$numberDays.'</span>'.$dayWord.'</li>
		  <li class="chart" data-percent="'.($numberHours/24*100).'"><span>'.$numberHours.'</span>'.$hourWord.'</li>
		  <li class="chart" data-percent="'.($numberMin/60*100).'"><span>'.$numberMin.'</span>'.$minWord.'</li>
		</ul>';
        $this->registerPlugin();
    }

    /**
     * Registers Timer plugin
     */
    protected function registerPlugin()
    {	
		$js = [];
		
		$view = $this->getView();

		TimerAsset::register($view);
			
		$options = Json::encode($this->clientOptions);
		
		$js[] = "window.addEventListener('DOMContentLoaded', function() {
			var charts = [];
				[].forEach.call(document.querySelectorAll('.chart'),  function(el) {
					charts.push(new EasyPieChart(el, $options));
				});
			});";
		
		$view->registerJs(implode("\n", $js));
    }
}