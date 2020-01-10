<?php

use yii\db\Migration;

/**
 * Class m200108_224305_addFK
 */
class m200108_224305_addFK extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('collectionsGames', 'saga_id', $this->integer()->notNull());

        $this->addForeignKey('collections', '{{%collectionsGames}}', 'saga_id', '{{%collections}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200108_224305_addFK cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200108_224305_addFK cannot be reverted.\n";

        return false;
    }
    */
}
