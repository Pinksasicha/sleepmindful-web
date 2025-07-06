<?php

class Issues extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['issues'] = new Issue();
    $data['issues']->order_by('id', 'desc')->get();
    $this->template->build('admin/index', $data);
  }

  public function form($id = null)
  {
    $data['issue'] = new Issue($id);
    $this->template->build('admin/form', $data);
  }

  public function save($id = null)
  {
    if ($_POST) {
      $issue = new Issue($id);
      $issue->from_array($_POST);
      $issue->save();
      set_notify('success', lang('save_data_complete'));
      redirect('issues/admin/issues');
    }
  }

  public function delete($id)
  {
    $issue = new Issue($id);
    $issue->delete();
    set_notify('success', lang('delete_data_complete'));
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function sequence()
  {
    foreach ($this->input->post('issue') as $key => $id) {
      $issue = new Issue($id);
      $issue->sequence = $key + 1;
      $issue->save();
    }
  }
}
