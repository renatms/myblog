<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m200408_121822_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comment}}', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'status' => $this->integer(),
            'date' => $this->date()
        ]);

        // add foreign key for table `user`
        $this->addForeignKey('fk-user-id', 'comment', 'user_id',
            'user', 'id', 'CASCADE');

        // add foreign key for table `article`
        $this->addForeignKey('fk-article-id', 'comment', 'article_id',
            'article', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-user-id',
            'comment');
        $this->dropForeignKey('fk-article-id',
            'comment');
        $this->dropTable('{{%comment}}');
    }
}
