<?php

namespace Fuel\Migrations;

class Create_questionoptions
{
	public function up()
	{
		\DBUtil::create_table('questionoptions', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'question_id' => array('constraint' => 11, 'type' => 'int'),
			'option_choice_id' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('questionoptions');
	}
}