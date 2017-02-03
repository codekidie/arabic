<?php
class Model_Unitofmeasure extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'unit_of_measures_name',
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
		$val->add_field('unit_of_measures_name', 'Unit Of Measures Name', 'required|max_length[255]');

		return $val;
	}

}
