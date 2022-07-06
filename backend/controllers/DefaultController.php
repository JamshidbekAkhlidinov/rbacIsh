<?php

namespace backend\controllers;

use backend\models\User;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;

class DefaultController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only'=>['index','login'],
                'rules' => [
                    [
                        'actions' => ['login','aktiv'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['view','index'],
                        'allow' => true,
                        'roles' => ['user'],
                    ],
                    [
                        'actions' => ['logout','profil','index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
                
            ],

            'verb' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST']
                ]
            ]
        ];
    }

    public function beforeAction($action)
    {
        if($action->id=='delete'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }


}
