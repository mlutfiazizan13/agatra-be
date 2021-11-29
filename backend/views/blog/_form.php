<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\models\Image;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Blog */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="blog-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'highlight')->textarea(['row' => 3,'maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::class, [
        'preset' => 'full',
    ]) ?>


    
    <?php if (!$model->isNewRecord): ?>
            <?php
            if (!empty($model->image)){
                 
                    $img = Html::img(Yii::$app->params['hostImage'].'/'.$modelImage->image, ['width' => '200px']);

                }
            ?>
    
        <?= $form->field($modelImage, 'image')->widget(kartik\file\FileInput::class,[
            'options' => [
                'accept' => 'image/*',
                'multiple' => false,
            ],
            'pluginOptions' => [
                'showUpload' => false,
                'showCancel' => false,
                'previewFileType' => 'image',
                'initialPreview' =>  Html::img(Yii::$app->params['hostImage'].'/'.$modelImage->image, ['width' => '200px']),
                'initialCaption' => $modelImage->image,
                'uploadAsync'=> true,
            ]
         ])?>
        <?php else : ?>
            <?= $form->field($modelImage, 'image')->widget(kartik\file\FileInput::class, [
            'options' => [
                'accept' => 'image/*',
                'multiple' => false
            ],
            'pluginOptions' => [
                'showUpload' => false,
            ]
        ]); ?>
    <?php endif; ?>

    <?= $form->field($model, 'published')->dropDownList($model->getPublished(), ['class' => 'form-select', 'value' => $model->isNewRecord ? 0 : $model->published]) ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
