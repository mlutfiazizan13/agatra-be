<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blog-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'author',
            [
                'attribute' => 'published',
                'format' => 'raw',
                'value' => function($data){
                    switch($data->published){
                        case 1:
                            return '<span class="badge bg-success px-4">Yes</span>';
                            break;
                        case 0:
                            return '<span class="badge bg-danger px-4">No</span>';
                            break;
                    }
                },
            ],
            //'is_deleted',
            [
                'attribute' => 'created_by',
                'value' => function($data){
                    return $data->createdBy->username;
                }
            ],

            [
                'attribute' => 'updated_by',
                'value' => function($data){
                    return $data->updatedBy->username;
                }
            ],
            'created_at',
            'updated_at',
            'highlight',
            [
                'attribute' => 'content',
                'format' => 'raw',
            ],
            [
                'attribute' => 'image',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img($data->imageTable['image_url'],
                        ['width' => '500px']);
                },
            ],
        ],
    ]) ?>
    <p>
        <?= Html::a('Back', ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
