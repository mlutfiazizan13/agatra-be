<?php

namespace api\controllers;

use Yii;
use api\models\LoginForm;
use api\models\User;
use yii\rest\ActiveController;
use yii\web\IdentityInterface;
use yii\filters\auth\HttpBearerAuth;

/**
 * User controller
 */
class UserController extends ActiveController
{
    public $modelClass = User::class;

    public function actions()
    {
        $action = parent::actions();
        unset($action['index']);
        unset($action['create']);
        unset($action['update']);
        unset($action['delete']);
    }

    public function actionIndex()
    {

    }

    /**
     * landing
     * @return array
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionLogin()
    {
        $model = new LoginForm();
        if ($model->load(Yii::$app->getRequest()->getBodyParams(), '') && $model->login()) {
            return [
                'username' => $model->username,     
                'access_token' => $model->login(),         
            ];
        } else {
            return $model->getFirstErrors();
        }
    }

    public function actionLogout()
    {
        $userID = Yii::$app->session->get('userID');

        $userModel = User::find()->where(['id'=>$userID])->one();
        if(!empty($userModel))
        {
            $userModel->token=NULL;
            $userModel->save(false);
        }
        Yii::$app->user->logout(false);

    }
}


