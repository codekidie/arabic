<?php

namespace Fuel\Migrations;

class Create_usersurveysections
{
	public function up()
	{
		\DBUtil::create_table('usersurveysections', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'userid' => array('constraint' => 11, 'type' => 'int'),
			'surveysectionid' => array('constraint' => 11, 'type' => 'int'),
			'completed_on' => array('type' => 'datetime'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('usersurveysections');
	}
}