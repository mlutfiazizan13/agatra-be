<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Image;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use Cloudinary\Transformation\Format;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Blogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('<i class="bi bi-plus-lg me-1"></i> Create Blog', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('<i class="bi bi-trash me-1"></i> Deleted Blog', ['/deleted-blog'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'title',
            [
                'attribute' => 'image_id',
                'format' => 'html',    
                'value' => function ($data) {
                    return Html::img($data->imageTable['image_url'],
                        ['width' => '50px']);
                },
            ],

            'author',

            [
                'attribute' => 'published',
                'format' => 'raw',
                'value' => function($data){
                    switch($data->published){
                        case 1:
                            return '<span class="badge bg-success w-50">Yes</span>';
                            break;
                        case 0:
                            return '<span class="badge bg-danger w-50">No</span>';
                            break;
                    }
                },
            ],

            'created_at',

            [
                'format'=>'raw',
                'value' => function($model){
                return
                    Html::a('<i class="bi bi-eye-fill"></i>', ['view','id'=>$model->id], ['title' => 'view','class'=>'btn btn-primary']).' '.
                    Html::a('<i class="bi bi-pencil-fill"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-success']).' '.
                    Html::a('<i class="bi bi-trash"></i>', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]);
                }
            ],
        ],

    ]); 
    ?>

    <?php LinkPager::widget([
        'pagination'=>$dataProvider->pagination,
    ]);
    
    ?>


</div>
