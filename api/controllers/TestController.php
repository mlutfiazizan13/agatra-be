<?php

namespace api\controllers;

/**
 * Site controller
 */
class TestController extends \yii\rest\Controller
{
    public function actionIndex()
    {
        return ["status"=> "OK"];
    }
}
