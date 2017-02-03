<?php
class Model_Optionchoice extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'optiongroupid',
		'option_choice_name',
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
		$val->add_field('optiongroupid', 'Optiongroupid', 'required|valid_string[numeric]');
		$val->add_field('option_choice_name', 'Option Choice Name', 'required|max_length[255]');

		return $val;
	}

}
