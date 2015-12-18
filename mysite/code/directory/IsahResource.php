<?php

class IsahResource extends DataObject {

	private static $db = array(
		'Title' => 'Varchar(155)',
		//'Address'         => 'HTMLText',
		'Phone'           => 'Text',
		'Email'           => 'Text',
		'Website'         => 'Text',
		'Content'         => 'HTMLText',
		'ServicesOffered' => 'HTMLText',

	);

	private static $has_one = array(
		'County' => 'County',
	);

	private static $singular_name = 'Resource';

	private static $many_many = array(
		'Categories' => 'IsahResourceCategory',
	);

	public function getCMSFields() {
		//$f = parent::getCMSFields();

		$f = new FieldList();
		$f->push(new TextField('Title', 'Title'));
		$catField = TagField::create('Categories', 'Categories', IsahResourceCategory::get(), $this->Categories())->setShouldLazyLoad(true);
		$f->push($catField);

		$f->push(new TextField('Phone', 'Phone number'));
		$f->push(new TextField('Email', 'Email Address'));
		$f->push(new TextField('Website', 'Website URL (please include the http:// or https://)'));

		$addrFields = $this->getAddressFields();
		foreach ($addrFields as $field) {
			$f->push($field);
		}

		$f->removeByName('Suburb');
		$f->renameField('Postcode', 'ZIP code');
		$f->renameField('Address', 'Address (including the city)');

		return $f;
	}

}