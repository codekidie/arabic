<?php
class Model_Surversection extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'survey_header_id',
		'section_name',
		'section_title',
		'section_subheading',
		'section_required_yn',
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
		$val->add_field('survey_header_id', 'Survey Header Id', 'required|valid_string[numeric]');
		$val->add_field('section_name', 'Section Name', 'required|max_length[255]');
		$val->add_field('section_title', 'Section Title', 'required|max_length[255]');
		$val->add_field('section_subheading', 'Section Subheading', 'required|max_length[255]');
		$val->add_field('section_required_yn', 'Section Required Yn', 'required|valid_string[numeric]');

		return $val;
	}

}
