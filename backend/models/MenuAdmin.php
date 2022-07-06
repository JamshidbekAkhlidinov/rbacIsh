<?php


namespace backend\models;

use backend\widgets\Menu;
use Yii;
use yii\base\Model;
use yii\helpers\Url;

class MenuAdmin extends Model{

    public static function getData():string
    {
        return  Menu::widget([
            'options'=>[
                'class'=>'sidebar-menu',
                'data-widget'=>"tree",
            ],
            'encodeLabels' => false,
            'items'=>[
                [
                    'label' => 'Asosiy menyu',
                    'options' =>[
                            'class' => 'header',
                    ]
                ],
                [
                    'label' => 'Bosh sahifa',
                    'icon' => 'home',
                    'url' => Url::to(['/dashboard/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'dashboard/index',
                        'dashboard/view',
                        'dashboard/update',
                        'dashboard/create',
                    ]),
                ],
                [
                    'label' => 'user',
                    'icon' => 'home',
                    'url' => Url::to(['/user/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'user/index',
                        'user/view',
                        'user/update',
                        'user/create',
                    ]),
                ],
                [
                    'label' => 'auth-assignment',
                    'icon' => 'home',
                    'url' => Url::to(['/auth-assignment/index']),
                    'active' => in_array(Yii::$app->controller->getRoute(), [
                        'auth-assignment/index',
                        'auth-assignment/view',
                        'auth-assignment/update',
                        'auth-assignment/create',
                    ]),
                ],
                [
                    'label' => 'Video kurslar',
                    'icon' => 'telegram',
                    'url' => '#',
                    'items' => [
                        [
                            'label'=>'<span>Users</span>',
                            'icon'=>'home',
                            'url'=>Url::to(['/videokurslar/index']),
                            'active' => in_array(Yii::$app->controller->getRoute(), [
                                'videokurslar/index',
                                'videokurslar/view',
                                'videokurslar/update',
                                'videokurslar/create',
                            ]),
                        ],
                        
                       
                    ],
                ],
                
        
        
            ],
         ]);
    }



}



?>