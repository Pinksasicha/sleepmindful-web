<?php

class Issue extends ORM
{
  public $table = 'issues';

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}
