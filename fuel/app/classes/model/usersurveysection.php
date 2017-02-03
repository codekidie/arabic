<?php
class Model_Usersurveysection extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'userid',
		'surveysectionid',
		'completed_on',
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
		$val->add_field('userid', 'Userid', 'required|valid_string[numeric]');
		$val->add_field('surveysectionid', 'Surveysectionid', 'required|valid_string[numeric]');
		$val->add_field('completed_on', 'Completed On', 'required');

		return $val;
	}

}
