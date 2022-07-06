<?php

namespace backend\controllers;

use backend\models\BotApi;
use backend\models\User;
use backend\models\UserSearch;
use yii\base\ErrorException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends DefaultController
{

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->can('user')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new NotFoundHttpException("Sizga kirishga ruxsat yo'q");
        }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('admin')) {
            $model = new User();

            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $model->auth_key = Yii::$app->security->generateRandomString();
                    $password = random_int(111111, 999999);
                    $bot = new BotApi("1477690574:AAGgiXwcbtg_jJHgb6jA6H3io_r4LGAFvdA");
                    $url  = "http://".$_SERVER['SERVER_NAME']."/admin/dashboard/aktiv?id=".$model->auth_key;
                    $bot->sendMessage("1374390161", "Login: {$model->username} \nParol: $password\nAktivlashtirish kodi: $url");
                    $model->password_hash = Yii::$app->security->generatePasswordHash($password);
                    $model->status = 9;
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } else {
                $model->loadDefaultValues();
            }
        }else{
             throw new NotFoundHttpException("Sizga kirishga ruxsat yo'q");
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('admin')) {
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new NotFoundHttpException("Sizga kirishga ruxsat yo'q");
        }

    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->can('admin')) {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }else {
            throw new NotFoundHttpException("Sizga kirishga ruxsat yo'q");
        }

}

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
