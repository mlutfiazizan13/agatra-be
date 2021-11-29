<?php

namespace api\modules\v1\controllers;

use common\models\Blog;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;

/**
 * Blog controller
 */
class BlogController extends ActiveController
{
    public $modelClass = Blog::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }
}
