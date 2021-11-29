<?php

namespace app\resource;

class Blog extends \common\models\Blog
{
    public function extraFields()
    {
        return ['createdBy'];
    }


}
