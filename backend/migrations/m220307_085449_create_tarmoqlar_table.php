<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tarmoqlar}}`.
 */
class m220307_085449_create_tarmoqlar_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tarmoqlar}}', [
            'id' => $this->primaryKey(),
            'title'=>$this->string(),
            'img'=>$this->integer(),
            'link'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tarmoqlar}}');
    }
}
