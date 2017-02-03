<?php

namespace Fuel\Migrations;

class Create_unitofmeasures
{
	public function up()
	{
		\DBUtil::create_table('unitofmeasures', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'unit_of_measures_name' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('unitofmeasures');
	}
}