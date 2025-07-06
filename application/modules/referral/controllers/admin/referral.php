<?php

class Referral extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['referral'] = $this->db->get('referral')->result();
        $this->template->build('admin/index', $data);
    }
    
    
}
