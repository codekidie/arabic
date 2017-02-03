<?php

namespace Fuel\Migrations;

class Create_optionchoices
{
	public function up()
	{
		\DBUtil::create_table('optionchoices', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'optiongroupid' => array('constraint' => 11, 'type' => 'int'),
			'option_choice_name' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('optionchoices');
	}
}