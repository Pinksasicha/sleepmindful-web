<?php

class Score_question extends ORM
{
  public $has_one = ['score_answer'];

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}
