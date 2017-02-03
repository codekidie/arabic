<?php

namespace Fuel\Migrations;

class Create_surveyheaders
{
	public function up()
	{
		\DBUtil::create_table('surveyheaders', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'organization_id' => array('constraint' => 11, 'type' => 'int'),
			'survey_name' => array('constraint' => 255, 'type' => 'varchar'),
			'instructions' => array('constraint' => 255, 'type' => 'varchar'),
			'other_header_info' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('surveyheaders');
	}
}