<?php

use yii\db\Migration;

class m190204_125013_create_table_parcels extends Migration
{
    public function up()
    {
        $this->createTable('parcels', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'weight' => $this->decimal(8,2)->notNull(),
            'delivery_id' => $this->integer()->notNull(),
            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex(
            'idx-parcels-delivery_id',
            'parcels',
            'delivery_id'
        );

        $this->addForeignKey(
            'fk-parcels-delivery_id',
            'parcels',
            'delivery_id',
            'delivery',
            'id',
            'CASCADE'
        );

        $this->insert('parcels', [
            'name' => 'Телефон',
            'weight' => 1.00,
            'delivery_id' => 1,
            'status' => 1,
        ]);
        $this->insert('parcels', [
            'name' => 'Телевизор',
            'weight' => 20.00,
            'delivery_id' => 1,
            'status' => 1,
        ]);
        $this->insert('parcels', [
            'name' => 'Обувь',
            'weight' => 10.00,
            'delivery_id' => 2,
            'status' => 0,
        ]);
    }

    public function down()
    {
        $this->dropTable('parcels');
    }
}
