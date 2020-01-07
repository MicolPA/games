<?php

use yii\db\Migration;

/**
 * Class m190503_000210_new_table_games
 */
class m190503_000210_new_table_games extends Migration
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

        $this->createTable('{{%games}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'resumen' => $this->text(),
            'category_id' => $this->integer(),
            'requirements_id' => $this->integer(),
            'requirementsType_id' => $this->integer(),
            'platform_id' => $this->integer(),
            'portada_out' => $this->string(),
            'portada_in' => $this->string(),
            'imagenes' => $this->text(),
            'links' => $this->text(),
            'date' => $this->dateTime(),
        ], $tableOptions);

         $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date' => $this->dateTime(),
        ], $tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190503_000210_new_table_games cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190503_000210_new_table_games cannot be reverted.\n";

        return false;
    }
    */
}
