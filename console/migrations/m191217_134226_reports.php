<?php

use yii\db\Migration;

/**
 * Class m191217_134226_reports
 */
class m191217_134226_reports extends Migration
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

            $this->createTable('{{%reports}}', [
                'id' => $this->primaryKey(),
                'email' => $this->string()->notNull(),
                'game_id' => $this->integer()->notNull(),
                'game_name' => $this->string()->notNull(),
                'error' => $this->string()->notNull(),
                'status' => $this->integer()->notNull(),
                'date' => $this->dateTime()->notNull(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191217_134226_reports cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191217_134226_reports cannot be reverted.\n";

        return false;
    }
    */
}
