<?php

class m121129_160340_add_user_id_column_to_events extends CDbMigration
{
	public function up()
	{
		$this->addColumn('events', 'user_id', "integer");
	}

	public function down()
	{
		echo "m121129_160340_add_user_id_column_to_events does not support migration down.\n";
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