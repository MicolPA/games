<?php

use yii\db\Migration;

/**
 * Class m200108_172952_collectionGames
 */
class m200108_172952_collectionGames extends Migration
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

            $this->createTable('{{%collectionsGames}}', [
                'id' => $this->primaryKey(),
                'game_id' => $this->integer()->notNull(),
                'game_name' => $this->string(),
                'saga_id' => $this->string(),
                'orden' => $this->string(),
                'date' => $this->dateTime()->notNull(),

        ], $tableOptions);

            $this->addForeignKey('collectionsGames', '{{%collections_Games}}', 'game_id', '{{%games}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200108_172952_collectionGames cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200108_172952_collectionGames cannot be reverted.\n";

        return false;
    }
    */
}
