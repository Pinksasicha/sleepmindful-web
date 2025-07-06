<?php

class Activity_media extends ORM
{
	public $table = 'activities_media';
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}

	public function type()
	{
		return array('image'=>'image', 'youtube'=>'youtube');
	}

	function thumbnail_path()
	{
    	$path = 'uploads/activity_media/'.$this->thumbnail;
		if(is_file($path))
		{
			return $path;
		}
		return false;
	}
	
	function image_path()
	{
    	$path = 'uploads/activity_media/'.$this->image;
		if(is_file($path))
		{
			return $path;
		}
		return false;
	}
}