<?php

namespace Fuel\Migrations;

class Create_surveycomments
{
	public function up()
	{
		\DBUtil::create_table('surveycomments', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'survey_header_id' => array('constraint' => 11, 'type' => 'int'),
			'comments' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('surveycomments');
	}
}