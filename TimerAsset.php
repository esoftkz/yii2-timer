<?php
namespace esoftkz\timer;

use yii\web\AssetBundle;

/**
 * CKEditorAsset
 */
class TimerAsset extends AssetBundle
{
    public $js = [      
        'js/easypiechart.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        $this->sourcePath = __DIR__ . '/assets/timer';
        parent::init();
    }
}
