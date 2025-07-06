<?php

class Highlight extends ORM
{

	public $table = 'highlight';

	public $has_one = array('hotel');

	public $has_many = array();

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}