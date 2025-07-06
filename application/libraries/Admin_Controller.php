<?php
class Admin_Controller extends Master_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!is_admin_login()) {
      redirect('administrators/auth');
    }
    $this->template->set_theme('admin');
    $this->template->set_layout('layout');
    $this->template->append_metadata(js_notify());
    $this->lang->load('admin');
  }
}
