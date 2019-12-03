<?php

use yii\db\Migration;
use frontend\models\RequirementsType;

/**
 * Class m191203_144823_requirementsType
 */
class m191203_144823_requirementsType extends Migration
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

        $this->createTable('{{%requirementsType}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),

        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191203_144823_requirementsType cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191203_144823_requirementsType cannot be reverted.\n";

        return false;
    }
    */
}
