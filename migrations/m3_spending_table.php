<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 04.12.16
 * Time: 15:25
 */

namespace altiore\money\migrations;

use altiore\base\console\Migration;
use altiore\money\MoneyModule;
use Yii;

class m3_spending_table extends Migration
{
    private $table = '{{%spending}}';
    private $categoryTable = '{{%spending_category}}';
    private $currencyTable = '{{%currency}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        /** @var MoneyModule $module */
        $module = Yii::$app->getModule('money');

        $this->createTable($this->table, [
            'id'          => $this->primaryKey(),
            'sum'         => $this->double(),
            'category_id' => $this->integer(),
            'currency_id' => $this->integer(),
            'user_id'     => $this->integer()->notNull(),
            'date'        => $this->integer()->notNull(),
            'created_at'  => $this->integer()->notNull(),
            'updated_at'  => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex(null, $this->table, 'user_id');
        $this->addForeignKey(
            null,
            $this->table,
            'user_id',
            $module->userTableName,
            $module->userTablePrimaryKey,
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(null, $this->table, 'category_id');
        $this->addForeignKey(
            null,
            $this->table,
            'category_id',
            $this->categoryTable,
            'id',
            'SET NULL',
            'CASCADE'
        );

        $this->createIndex(null, $this->table, 'category_id');
        $this->addForeignKey(
            null,
            $this->table,
            'currency_id',
            $this->currencyTable,
            'id',
            'SET NULL',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
