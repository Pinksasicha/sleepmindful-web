<?php

class Users extends Public_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function login()
  {
    $this->template->build('login');
  }

  public function action_login()
  {
    if ($_POST) {
      $user = new User();
      $user->username = $this->input->post('username');
      $user->password = $this->input->post('password');
      if ($user->login()) {
        if (!empty($_POST['remember'])) {
          $this->config->set_item('sess_expiration', 0);
        }
        $this->session->sess_destroy();
        $this->session->sess_create();
        $this->session->set_userdata('id', $user->id);
        redirect('home');
      } else {
        $notify = [
          'login_error' => true
        ];
        $this->session->set_flashdata($notify);
        redirect('login?username=' . $user->username);
      }
    }
  }

  public function register()
  {
    $this->template->build('register');
  }

  public function action_register()
  {
    $user = new User();
    $user->from_array($_POST);
    $user->asq_date = Date2DB($this->input->post('asq_date'));
    $user->height = $this->input->post('feet') . '.' . $this->input->post('inch');
    $user->save();
    $notify = [
      'register_thankyou' => true
    ];
    $this->session->set_flashdata($notify);
    redirect('home');
  }

  public function logout()
  {
    logout();
    redirect('home');
  }

  public function check()
  {
    if ($this->input->get('username') == '') {
      echo json_encode(['status' => false, 'msg' => 'Username is empty']);
      exit();
    }
    if ($this->input->get('email') == '') {
      echo json_encode(['status' => false, 'msg' => 'Email is empty']);
      exit();
    }
    $username = $this->input->get('username');
    $email = $this->input->get('email');
    $check_user = false;
    $check_email = false;
    $status = true;
    $msg = '';
    $user = new User();
    $user->get_by_username($username);
    if ($user->exists()) {
      $status = false;
      $msg = 'Username is already exist';
      $check_user = true;
    }
    $user = new User();
    $user->get_by_email($email);
    if ($user->exists()) {
      $status = false;
      $msg = 'Email is already exist';
      $check_email = true;
    }
    if ($check_user && $check_email) {
      $status = false;
      $msg = 'Username and Email is already exist';
    }
    echo json_encode(['status' => $status, 'msg' => $msg]);
  }

  public function history()
  {
    if (!is_login()) {
      redirect('login');
    }
    $data['questions'] = new Question_list();
    $data['questions']->order_by('sequence', 'asc')->get();
    $data['question'] = $this->db->select('*')->from('question_status')->join('question_lists','question_status.question_list_id = question_lists.id','left')->where('question_status.user_id',user()->id)->get()->result();
    $this->template->build('history', $data);
  }

  public function referral()
  {
    $this->template->build('referral');
  }

  public function save_referral()
  {
    $data = array(
      'name' => $this->input->post('first_name'),
      'surname' => $this->input->post('last_name'),
      'email' => $this->input->post('email'),
      'mobile' => $this->input->post('mobile'),
      'timetocall' => $this->input->post('timetocall'),
      'liveinthailand' => $this->input->post('livein')
);
$notify = [
  'referral' => true
];
$this->session->set_flashdata($notify);
$this->db->insert('referral', $data);
redirect('users/referral');
  }
  
}
