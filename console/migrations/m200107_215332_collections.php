<?php

use yii\db\Migration;

/**
 * Class m200107_215332_collections
 */
class m200107_215332_collections extends Migration
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

            $this->createTable('{{%collections}}', [
                'id' => $this->primaryKey(),
                'name' => $this->string()->notNull(),
                'portada' => $this->string(),
                'date' => $this->dateTime()->notNull(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200107_215332_collections cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200107_215332_collections cannot be reverted.\n";

        return false;
    }
    */
}
