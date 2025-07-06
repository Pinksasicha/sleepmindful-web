<?php

class Score_user extends ORM
{
  public $has_one = ['user'];

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}
