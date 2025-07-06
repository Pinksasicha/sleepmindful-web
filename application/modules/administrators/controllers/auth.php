<?php

class Auth extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $admin_id = $this->session->userdata('admin_id');
        if (!empty($admin_id)) {
            set_notify('success', 'Welcome ;)');
            redirect('blogs/admin/blogs');
        } else {
            $this->template->set_theme('admin');
            $this->template->set_layout('login');
            $this->template->title('Excellent choice for Organ Transplantation | Backoffice');
            $this->template->build('auth/login');
        }
    }
    
    public function login()
    {
        if ($_POST) {
            $admin = new Administrator();
            $admin->username = $this->input->post('username');
            $admin->password = $this->input->post('password');
            if ($admin->login()) {
                if (!empty($_POST['remember'])) {
                    $this->config->set_item('sess_expiration', 0);
                }
                $this->session->sess_destroy();
                $this->session->sess_create();
                $this->session->set_userdata('admin_id', $admin->id);

                set_notify('success', 'Welcome ;)');
                redirect('blogs/admin/blogs');
            } else {
                set_notify('error', 'Username or Password Invalid');
                redirect('administrators/auth?u='.$admin->username);
            }
        }
    }
    
    public function logout()
    {
        logout();
        redirect('administrators/auth');
    }
}
