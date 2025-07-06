<?php

class Blogs extends Public_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['blogs'] = new Blog();
    $data['blogs']->order_by('id', 'desc')->get_page(6);
    $this->template->build('index', $data);
  }

  public function home()
  {
    $data['blogs'] = new Blog();
    $data['blogs']->order_by('id', 'desc')->limit(3)->get();
    return $this->load->view('home', $data, true);
  }

  public function view($id)
  {
    $data['blog'] = new Blog($id);
    $data['blogs'] = new Blog();
    $data['blogs']->where('id <>', $id)->order_by('id', 'desc')->limit(3)->get();

    $this->template->set_metadata('og:title', $data['blog']->title, 'facebook');
    $this->template->set_metadata('og:description', $data['blog']->intro(200), 'facebook');
    $this->template->set_metadata('og:image', base_url() . $data['blog']->thumbnail_path(), 'facebook');
    $this->template->set_metadata('og:url', $data['blog']->permanent_url(), 'facebook');

    $this->template->build('view', $data);
  }
}
