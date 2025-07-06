<?php

class Banner extends ORM
{
  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  public function thumbnail_path()
  {
    $path = 'uploads/banner/' . $this->thumbnail;
    if (is_file($path)) {
      return $path;
    }
    return false;
  }

  public function banner_path()
  {
    $path = 'uploads/banner/' . $this->banner;
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
    return 'banner/' . $this->id . '-' . url_title(strtolower($this->title));
  }

  public function permanent_url()
  {
    return base_url() . 'banner/view/' . $this->id;
  }

  public function insert_image($image)
 {
  // assign the data to an array
  $data = array(
   'id' => $this->input->post('id'),
   
   'image' => $image
  );
  //insert image to the database
  $this->db->insert('banner', $data);
 }
 

}
