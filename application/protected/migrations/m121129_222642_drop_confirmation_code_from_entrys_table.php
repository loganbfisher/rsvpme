<?php

class m121129_222642_drop_confirmation_code_from_entrys_table extends CDbMigration
{
	public function up()
	{
          $this->dropColumn('entrys','confirmation_code');
	}

	public function down()
	{
		echo "m121129_222642_drop_confirmation_code_from_entrys_table does not support migration down.\n";
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