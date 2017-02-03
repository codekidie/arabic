<?php

namespace Fuel\Migrations;

class Create_answers
{
	public function up()
	{
		\DBUtil::create_table('answers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'question_option_id' => array('constraint' => 11, 'type' => 'int'),
			'answer_numeric' => array('constraint' => 11, 'type' => 'int'),
			'answer_text' => array('constraint' => 255, 'type' => 'varchar'),
			'answer_yn' => array('constraint' => 1, 'type' => 'tinyint'),
			'unit_of_measure_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('answers');
	}
}