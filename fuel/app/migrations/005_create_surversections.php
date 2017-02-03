<?php

namespace Fuel\Migrations;

class Create_surversections
{
	public function up()
	{
		\DBUtil::create_table('surversections', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'survey_header_id' => array('constraint' => 11, 'type' => 'int'),
			'section_name' => array('constraint' => 255, 'type' => 'varchar'),
			'section_title' => array('constraint' => 255, 'type' => 'varchar'),
			'section_subheading' => array('constraint' => 255, 'type' => 'varchar'),
			'section_required_yn' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('surversections');
	}
}