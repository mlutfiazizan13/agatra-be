<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m201117_031141_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string()->notNull(),
            'path' => $this->string()->notNull(),
            'image_url' => $this->string()->notNull()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
