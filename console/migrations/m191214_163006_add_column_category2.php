<?php

use yii\db\Migration;

/**
 * Class m191214_163006_add_column_category2
 */
class m191214_163006_add_column_category2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('games', 'category_id2', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191214_163006_add_column_category2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191214_163006_add_column_category2 cannot be reverted.\n";

        return false;
    }
    */
}
