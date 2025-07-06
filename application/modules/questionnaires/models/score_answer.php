<?php

class Score_answer extends ORM
{
  public $has_one = ['score_question'];

  public function __construct($id = null)
  {
    parent::__construct($id);
  }
}
