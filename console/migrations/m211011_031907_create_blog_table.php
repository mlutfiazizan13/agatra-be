<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%image}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m211011_031907_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
            'image_id' => $this->integer(),
            'published' => $this->boolean()->defaultValue(0),
            'is_deleted' => $this->boolean()->defaultValue(0),
            'created_by' => $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `image`
        $this->createIndex(
            '{{%idx-blog-image}}',
            '{{%blog}}',
            'image_id'
        );

        // add foreign key for table `{{%image}}`
        $this->addForeignKey(
            '{{%fk-blog-image}}',
            '{{%blog}}',
            'image_id',
            '{{%image}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-blog-created_by}}',
            '{{%blog}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-blog-created_by}}',
            '{{%blog}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-blog-updated_by}}',
            '{{%blog}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-blog-updated_by}}',
            '{{%blog}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%image}}`
        $this->dropForeignKey(
            '{{%fk-blog-image}}',
            '{{%blog}}'
        );

        // drops index for column `image`
        $this->dropIndex(
            '{{%idx-blog-image}}',
            '{{%blog}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-blog-created_by}}',
            '{{%blog}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-blog-created_by}}',
            '{{%blog}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-blog-updated_by}}',
            '{{%blog}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-blog-updated_by}}',
            '{{%blog}}'
        );

        $this->dropTable('{{%blog}}');
    }
}
