<?php

namespace api\modules\v1\controllers;

use yii\web\Response;

class TestController extends \yii\rest\Controller
{

    public function actionIndex()
    {
        return ["status" => "v1 OK"];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;
        
        return $behaviors;
    }
}
