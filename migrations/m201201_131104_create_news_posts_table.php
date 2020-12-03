<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news_posts}}`.
 */
class m201201_131104_create_news_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news_posts}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text(),
            'author' => $this->string(50),
            'phone' => $this->char(15),
            'email' => $this->char(100),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news_posts}}');
    }
}
