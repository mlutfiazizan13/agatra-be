<?php

namespace common\models;

use Yii;
use yii\db\Expression;
use common\models\User;
use common\models\Image;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property string $content
 * @property int|null $published
 * @property int|null $is_deleted
 * @property int|null $created_by
 * @property string|null $created_at
 * @property int|null $updated_by
 * @property string|null $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Blog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
    }

     /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class'=> TimestampBehavior::class,
                'value'=> new Expression('NOW()'),
            ],
            BlameableBehavior::class,           
        ]; 
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['content'], 'string'],
            [['published', 'is_deleted', 'created_by', 'updated_by', 'image_id'], 'integer'],
            [['created_at', 'updated_at', 'image_id'], 'safe'],
            [['title', 'author','highlight', 'path', 'image_url'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'author' => 'Author',
            'highlight' => 'Highlight',
            'content' => 'Content',
            'image_id' => 'Image',
            'path' => 'Path',
            'image_url' => 'Image Url',
            'published' => 'Published',
            'is_deleted' => 'Is Deleted',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_by' => 'Updated By',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public function getImageTable()
    {
        return $this->hasOne(Image::class, ['id' => 'image_id']);
    }

    public function getPublished()
    {
        return [
            1 => 'Yes',
            0 => 'No'
        ];
    }

}
