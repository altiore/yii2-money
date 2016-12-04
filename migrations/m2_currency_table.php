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

class m2_currency_table extends Migration
{
    private $table = '{{%currency}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->table, [
            'id'         => $this->primaryKey(),
            'title'      => $this->string()->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
