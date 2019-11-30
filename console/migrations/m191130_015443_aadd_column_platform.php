<?php

use yii\db\Migration;

/**
 * Class m191130_015443_aadd_column_platform
 */
class m191130_015443_aadd_column_platform extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%platform}}', 'color', $this->string()->defaultValue(null));
        $this->addColumn('{{%platform}}', 'icon', $this->string()->defaultValue(null));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191130_015443_aadd_column_platform cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191130_015443_aadd_column_platform cannot be reverted.\n";

        return false;
    }
    */
}
