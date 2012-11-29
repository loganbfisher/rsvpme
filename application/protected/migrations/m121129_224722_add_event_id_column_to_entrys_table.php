<?php

class m121129_224722_add_event_id_column_to_entrys_table extends CDbMigration
{
	public function up()
	{
          $this->addColumn('entrys', 'event_id', "integer");
	}

	public function down()
	{
		echo "m121129_224722_add_event_id_column_to_entrys_table does not support migration down.\n";
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