<?php

namespace Fuel\Migrations;

class Create_questions
{
	public function up()
	{
		\DBUtil::create_table('questions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'question_name' => array('constraint' => 255, 'type' => 'varchar'),
			'question_subtext' => array('constraint' => 255, 'type' => 'varchar'),
			'answer' => array('constraint' => 255, 'type' => 'varchar'),
			'option_group_id' => array('constraint' => 11, 'type' => 'int'),
			'allow_multiple_option_answers' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('questions');
	}
}