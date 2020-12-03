<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%notes}}`.
 */
class m201201_062654_add_created_at_column_to_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%notes}}', 'created_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%notes}}', 'created_at');
    }
}
