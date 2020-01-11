<?php

use yii\db\Migration;

/**
 * Class m200110_235658_new_field_saga
 */
class m200110_235658_new_field_saga extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('games', 'in_collection', $this->integer()->defaultValue(0));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200110_235658_new_field_saga cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200110_235658_new_field_saga cannot be reverted.\n";

        return false;
    }
    */
}
