<?php

class SexualAssaultResourceCategory extends DataObject {

	private static $db = array(
		'Title'      => 'Varchar(155)',
		'URLSegment' => 'Varchar(255)',
	);
	private static $extensions = array(
		'SexualAssaultProjectDirectoryURLSegmentExtension',
	);

	private static $singular_name     = 'ResourceCategory';
	private static $belongs_many_many = array(
		'Resources' => 'SexualAssaultResource',
	);

}