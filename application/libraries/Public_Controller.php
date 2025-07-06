<?php
class Public_Controller extends Master_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->template->title('SleepMindFul');
        $this->template->set_theme('default');
        $this->template->set_layout('layout');
    }
}
