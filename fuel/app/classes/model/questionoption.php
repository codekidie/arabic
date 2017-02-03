<?php
class Model_Questionoption extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'question_id',
		'option_choice_id',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('question_id', 'Question Id', 'required|valid_string[numeric]');
		$val->add_field('option_choice_id', 'Option Choice Id', 'required|valid_string[numeric]');

		return $val;
	}

}
