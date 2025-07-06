<?php

class Contacts extends Public_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function home()
  {
    return $this->load->view('home', null, true);
  }

  public function save()
  {
    $contact = new Contact();
    $contact->issue = $this->input->post('issue');
    $contact->first_name = $this->input->post('first_name');
    $contact->last_name = $this->input->post('last_name');
    $contact->mobile = $this->input->post('mobile');
    $contact->email = $this->input->post('email');
    $contact->ip_address = ip_address();
    $contact->save();

    $notify = [
      'thankyou' => true
    ];
    $this->session->set_flashdata($notify);
    redirect('home');
  }
}
