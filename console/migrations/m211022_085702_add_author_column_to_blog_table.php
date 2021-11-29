<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%blog}}`.
 */
class m211022_085702_add_author_column_to_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn( '{{%blog}}', 'author', $this->string(255)->after('title'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn( '{{%blog}}', 'author', $this->string(255)->after('title'));
    }
}
