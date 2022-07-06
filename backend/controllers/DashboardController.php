<?php

namespace backend\controllers;

use backend\models\PasswordForm;
use backend\models\User;
use Yii;

class DashboardController extends DefaultController
{
 

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionProfil()
    {
        $user = User::findOne(Yii::$app->user->identity->id);
        $pasword = new PasswordForm();
        if($user->load(Yii::$app->request->post())){
            if($user->save()){
                Yii::$app->session->setFlash('success','Muvafaqqiyatli o\'zgartirildi');
                return $this->redirect(['/dashboard/profil']);
            }else{
                Yii::$app->session->setFlash('warning',"Saqlashda xatolik");
                return $this->redirect(['/dashboard/profil']);
            }
        }
        if($pasword->load(Yii::$app->request->post())){
            If(Yii::$app->getSecurity()->validatePassword($pasword->password,$user->password_hash)){
                $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($pasword->password2);
                if($user->save()){
                    Yii::$app->session->setFlash('success','Parol muvafaqqiyatli o\'zgartirildi');
                    return $this->redirect(['/dashboard/profil']);
                }else{
                    Yii::$app->session->setFlash('warning',"Saqlashda xatolik");
                    return $this->redirect(['/dashboard/profil']);
                }
            }else{
                Yii::$app->session->setFlash('error',"Parol xato");
                return $this->redirect(['/dashboard/profil']);

            }
        }
        return $this->render('profil',['user'=>$user,'pasword'=>$pasword]);

    }



    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionAktiv($id){
        $model = User::findOne(['auth_key'=>$id]);
        if($model->status==9) {
            $model->status = 10;
            if($model->save()) {
                Yii::$app->session->setFlash('access',"Muvaffaqqiyatli aktivlashtirildi");
            }else{
                Yii::$app->session->setFlash('danger',"Xatolik yuz berdi.");
            }
        }else{
            Yii::$app->session->setFlash('warning',"Siz aktivlashirilgansiz");
        }
        return $this->redirect(['site/login']);


    }



}
