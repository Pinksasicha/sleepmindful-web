<?php

class Photo extends ORM
{
	public $table = 'photoes';

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
	public function og_image_path()
	{
		return base_url().'uploads/share/'.$this->nickname.'.jpg';
	}
	
	public function og_url()
	{
		return base_url().'share/'.$this->id;
	}
}