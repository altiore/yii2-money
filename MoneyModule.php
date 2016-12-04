<?php

namespace altiore\money;

use yii\base\Module;

/**
 * Class MoneyModule
 *
 * @package altiore\money
 */
class MoneyModule extends Module
{
    /**
     * @var string
     */
    public $userTableName = '{{%user}}';
    /**
     * @var string
     */
    public $userTablePrimaryKey = 'id';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'altiore\money\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
    }
}
