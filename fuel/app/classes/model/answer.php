<?php
class Model_Answer extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'question_option_id',
		'answer_numeric',
		'answer_text',
		'answer_yn',
		'unit_of_measure_id',
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
		$val->add_field('user_id', 'User Id', 'valid_string[numeric]');

		return $val;
	}

}
