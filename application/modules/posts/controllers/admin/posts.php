<?php

class Posts extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['posts'] = new Post();
    $data['posts']->order_by('id', 'desc')->get_page();
    $this->template->build('admin/index', $data);
  }

  public function form($id = null)
  {
    $data['post'] = new Post($id);
    $this->template->build('admin/form', $data);
  }

  public function save($id = null)
  {
    if ($_POST) {
      $post = new Post($id);
      $post->from_array($_POST);
      if ($_FILES['thumbnail']['name']) {
        $post->delete_file('uploads/post/', 'thumbnail');
        $post->thumbnail = $post->upload($_FILES['thumbnail'], 'uploads/post/', 460, 460);
      }
      if ($_FILES['banner']['name']) {
        $post->delete_file('uploads/post/', 'banner');
        $post->banner = $post->upload($_FILES['banner'], 'uploads/post/', 1280, 720);
      }
      $post->save();
      set_notify('success', lang('save_data_complete'));
      redirect('posts/admin/posts');
    }
  }

  public function delete($id)
  {
    $post = new Post($id);
    $post->delete();
    set_notify('success', lang('delete_data_complete'));
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function sequence()
  {
    foreach ($this->input->post('post') as $key => $id) {
      $post = new Legend($id);
      $post->sequence = $key + 1;
      $post->save();
    }
  }
}
