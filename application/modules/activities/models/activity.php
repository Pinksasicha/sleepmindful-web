<?php

class Activity extends ORM
{	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}

	function thumbnail_path()
	{
    	$path = 'uploads/activity/'.$this->thumbnail;
		if(is_file($path))
		{
			return $path;
		}
		return false;
	}
	
	function banner_path()
	{
    	$path = 'uploads/activity/'.$this->banner;
		if(is_file($path))
		{
			return $path;
		}
		return false;
	}

	public function intro($length = 100)
	{
		return trim(mb_substr(strip_tags($this->detail),0,$length, "utf-8"));
	}

	public function permanent_url()
	{
		return base_url().'activity/view/'.$this->id;
	}

}