<?php

class Aboutus extends Public_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['img'] = $this->db->get('banner')->result();
    $data['aboutus1'] = $this->db->where('id',1)->get('aboutus')->result();
    $data['aboutus2'] = $this->db->where('id',2)->get('aboutus')->result();
    $data['aboutus3'] = $this->db->where('id',3)->get('aboutus')->result();
    $data['aboutus4'] = $this->db->where('id',4)->get('aboutus')->result();
    $this->template->build('index',$data);
  }

  public function hero()
  {
    return $this->load->view('hero', null, true);
  }

}
