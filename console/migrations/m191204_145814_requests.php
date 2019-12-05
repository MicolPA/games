<?php

use yii\db\Migration;

/**
 * Class m191204_145814_requests
 */
class m191204_145814_requests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
                if ($this->db->driverName === 'mysql') {
                    // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                    $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
                }

                $this->createTable('{{%requests}}', [
                    'id' => $this->primaryKey(),
                    'name' => $this->string()->notNull(),
                    'platform' => $this->string()->notNull(),
                    'email' => $this->string()->notNull(),
                    'status' => $this->integer()->notNull(),
                    'statusDescription' => $this->string()->notNull(),
                    'date' => $this->dateTime()->notNull(),
                ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191204_145814_requests cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191204_145814_requests cannot be reverted.\n";

        return false;
    }
    */
}
