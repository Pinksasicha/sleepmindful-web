<?php

class Blogs extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['blogs'] = new Blog();
        $data['blogs']->order_by('id', 'desc')->get_page();
        $this->template->build('admin/index', $data);
    }
    
    public function form($id = null)
    {
        $data['blog'] = new Blog($id);
        $this->template->build('admin/form', $data);
    }
    
    public function save($id = null)
    {
        if ($_POST) {
            $blog = new Blog($id);
            $blog->from_array($_POST);
            if ($_FILES['thumbnail']['name']) {
                $blog->delete_file('uploads/blog/', 'thumbnail');
                $blog->thumbnail = $blog->upload($_FILES['thumbnail'], 'uploads/blog/', 430, 430);
            }
            if ($_FILES['banner']['name']) {
                $blog->delete_file('uploads/blog/', 'banner');
                $blog->banner = $blog->upload($_FILES['banner'], 'uploads/blog/', 1280, 720);
            }
            $blog->save();
            set_notify('success', lang('save_data_complete'));
            redirect('blogs/admin/blogs');
        }
    }
    
    public function delete($id)
    {
        $blog = new Blog($id);
        $blog->delete();
        set_notify('success', lang('delete_data_complete'));
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function sequence()
    {
        foreach ($this->input->post('blog') as $key => $id) {
            $blog = new Legend($id);
            $blog->sequence = $key+1;
            $blog->save();
        }
    }
}
