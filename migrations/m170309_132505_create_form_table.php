<?php

use yii\db\Migration;

class m170309_132505_crate_form_table extends Migration
{
    public function up()
    {
        $this->createTable('form', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'email' => $this->text(),
            'age' => $this->integer(),
            'height' => $this->integer(),
            'weight' => $this->integer(),
            'city' => $this->text(),
            'techies' => $this->text(),
            'english_level' =>$this->text(),
        ]);
    }

    public function down()
    {
       $this->dropTable('form');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
