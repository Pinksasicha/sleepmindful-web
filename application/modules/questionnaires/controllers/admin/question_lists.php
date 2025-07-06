<?php

class Question_lists extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['questions'] = new Question_list();
    $data['questions']->order_by('sequence', 'asc')->get();
    $this->template->build('admin/list', $data);
  }
}
