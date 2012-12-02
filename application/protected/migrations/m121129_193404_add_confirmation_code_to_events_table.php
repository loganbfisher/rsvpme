<?php

class m121129_193404_add_confirmation_code_to_events_table extends CDbMigration
{
	public function up()
	{
          $this->addColumn('events', 'confirmation_code', "string");
	}

	public function down()
	{
		echo "m121129_193404_add_confirmation_code_to_events_table does not support migration down.\n";
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