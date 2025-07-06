<?php

class Aboutus extends ORM
{
  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  public function thumbnail_path()
  {
    $path = 'uploads/aboutus/' . $this->thumbnail;
    if (is_file($path)) {
      return $path;
    }
    return false;
  }

  public function banner_path()
  {
    $path = 'uploads/aboutus/' . $this->banner;
    if (is_file($path)) {
      return $path;
    }
    return false;
  }

  public function intro($length = 100)
  {
    return trim(mb_substr(strip_tags($this->detail), 0, $length, 'utf-8')) . '...';
  }

  public function url()
  {
    return 'aboutus/' . $this->id . '-' . url_title(strtolower($this->title));
  }

  public function permanent_url()
  {
    return base_url() . 'aboutus/view/' . $this->id;
  }
}
