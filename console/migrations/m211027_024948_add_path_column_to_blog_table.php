<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%blog}}`.
 */
class m211027_024948_add_path_column_to_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%blog}}', 'path', $this->string(255)->after('image'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%blog}}', 'path');
        // $this->addColumn('{{%blog}}', 'imagePath', $this->string(255)->after('image'));
    }
}
