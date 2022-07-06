<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_bot}}`.
 */
class m220308_073544_create_telegram_bot_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%telegram_bot}}', [
            'id' => $this->primaryKey(),
            'token'=>$this->string(),
            'kanal'=>$this->string(),
            'guruh'=>$this->string(),
            'created_at'=>$this->integer(),
            'updated_at'=>$this->integer(),
        ]);
        $this->insert('telegram_bot',[
            'token'=>'bu_yerga_token_yoziladi',
            'kanal'=>"@kanal",
            'guruh'=>"@guruh",
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%telegram_bot}}');
    }
}
