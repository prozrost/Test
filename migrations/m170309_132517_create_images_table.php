<?php

use yii\db\Migration;

class m170309_132517_crate_images_table extends Migration
{
    public function up()
    {
        $this->createTable('images',[
           'id' => $this->primaryKey(),
            'form_id' => $this->integer(),
            'images' => $this->text()
        ]);
    }

    public function down()
    {
        $this->dropTable('images');
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
