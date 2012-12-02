<?php

class m121129_194139_alter_confirmation_column_in_entrys_table extends CDbMigration
{
	public function up()
	{
          $this->alterColumn('entrys','confirmation_code','string');
	}

	public function down()
	{
		echo "m121129_194139_alter_confirmation_column_in_entrys_table does not support migration down.\n";
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}