<?php

class County extends DataObject {

	private static $db = array(
		'Title'      => 'Varchar(155)',
		'Region'     => 'Int',
		'URLSegment' => 'Text',
		'State'      => 'Text',
	);

	private static $extensions = array(
		'IsahProjectDirectoryURLSegmentExtension',
	);

	private static $has_one = array(
		'Project' => 'IsahProject',
	);

	private static $has_many = array(
		'Resources' => 'IsahResource',
	);

	private static $summary_fields = array(
		'Title', 'Region', 'URLSegment',
	);

	private static $defaults = array(
		'State' => 'IA',
	);

	private static $default_sort = "Title ASC";

	public function getCMSFields() {
		//$f = parent::getCMSFields();

		$f = new FieldList();
		$f->push(new TextField('Title', 'Title'));
		$f->push(new TextField('State', 'State'));
		$f->push(new TextField('Region', 'Region'));

		$resGridFieldConfig = GridFieldConfig_RecordEditor::create();
		$resGridField       = new GridField('Resources', 'Resources', $this->Resources(), $resGridFieldConfig);
		$f->push($resGridField);

		return $f;
	}
}