<?php

use yii\db\Migration;

/**
 * Class m191127_133354_requirements
 */
class m191202_141206_requirements extends Migration
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

        $this->createTable('{{%requirements}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'sistemaOperativo' => $this->string()->notNull(),
            'procesador' => $this->string()->notNull(),
            'memoria' => $this->string()->notNull(),
            'graficos' => $this->string()->notNull(),
            'directX' => $this->string()->notNull(),
            'discoDuro' => $this->string()->notNull(),
            'otros' => $this->string()->notNull(),

        ], $tableOptions);

        $this->addColumn('{{%games}}', 'requirements_id', $this->integer()->defaultValue(null));
        $this->addColumn('{{%games}}', 'requirementsType_id', $this->integer()->defaultValue(null));

        $this->addForeignKey('requirements', '{{%games}}', 'requirements_id', '{{%requirements}}', 'id', 'CASCADE', 'CASCADE');



    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m191127_133354_requirements cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191127_133354_requirements cannot be reverted.\n";

        return false;
    }
    */
}
