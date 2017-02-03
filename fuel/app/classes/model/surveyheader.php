<?php
class Model_Surveyheader extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'organization_id',
		'survey_name',
		'instructions',
		'other_header_info',
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
		$val->add_field('organization_id', 'Organization Id', 'required|valid_string[numeric]');
		$val->add_field('survey_name', 'Survey Name', 'required|max_length[255]');
		$val->add_field('instructions', 'Instructions', 'required|max_length[255]');
		$val->add_field('other_header_info', 'Other Header Info', 'required|max_length[255]');

		return $val;
	}

}
