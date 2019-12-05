<?php

use yii\db\Migration;

/**
 * Class m191205_043120_add_columns
 */
class m191205_043120_add_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('games', 'size', $this->string());
        $this->addColumn('requests', 'comment', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191205_043120_add_columns cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191205_043120_add_columns cannot be reverted.\n";

        return false;
    }
    */
}
