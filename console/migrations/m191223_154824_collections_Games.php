<?php

use yii\db\Migration;

/**
 * Class m191223_154824_collections_Games
 */
class m191223_154824_collections_Games extends Migration
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

            $this->createTable('{{%collections_Games}}', [
                'id' => $this->primaryKey(),
                'game_id' => $this->integer()->notNull(),
                'game_name' => $this->string(),
                'saga_id' => $this->string(),
                'orden' => $this->string(),
                'date' => $this->dateTime()->notNull(),

        ], $tableOptions);

             $this->addForeignKey('game_id', '{{%collections_Games}}', 'game_id', '{{%games}}', 'id', 'CASCADE', 'CASCADE');
             $this->addForeignKey('game_name', '{{%collections_Games}}', 'game_name', '{{%games}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191223_154824_collections_Games cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191223_154824_collections_Games cannot be reverted.\n";

        return false;
    }
    */
}
