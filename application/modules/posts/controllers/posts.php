<?php

class Posts extends Public_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['posts'] = new Post();
    $data['posts']->order_by('id', 'desc')->get_page(6);
    $this->template->build('index', $data);
  }

  public function home()
  {
    $data['posts'] = new Post();
    $data['posts']->order_by('id', 'desc')->limit(6)->get();
    return $this->load->view('home', $data, true);
  }

  public function view($id)
  {
    $data['post'] = new Post($id);
    $data['posts'] = new Post();
    $data['posts']->where('id <>', $id)->order_by('id', 'desc')->limit(3)->get();

    $this->template->set_metadata('og:title', $data['post']->title, 'facebook');
    $this->template->set_metadata('og:description', $data['post']->intro(200), 'facebook');
    $this->template->set_metadata('og:image', base_url() . $data['post']->thumbnail_path(), 'facebook');
    $this->template->set_metadata('og:url', $data['post']->permanent_url(), 'facebook');

    $this->template->build('view', $data);
  }
}
