<?php

use yii\db\Migration;

class m190204_124513_create_table_delivery extends Migration
{
    public function up()
    {
        $this->createTable('delivery', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->decimal(8,2)->notNull(),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->insert('delivery', [
            'name' => 'РФ',
            'price' => 1.50,
        ]);
        $this->insert('delivery', [
            'name' => 'Международная',
            'price' => 3.50,
        ]);
    }

    public function down()
    {
        $this->dropTable('delivery');
    }
}
