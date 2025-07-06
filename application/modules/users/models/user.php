<?php

class User extends ORM
{
  public $table = 'users';

  public $has_many = ['question_user', 'score_user'];

  public $validation = [
    [
      'field' => 'password',
      'label' => 'Password',
      'rules' => ['required', 'trim', 'min_length' => 6, 'encrypt']
    ]
  ];

  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  public function _encrypt($field)
  {
    // Don't encrypt an empty string
    if (!empty($this->{$field})) {
      // Generate a random salt if empty
      if (empty($this->salt)) {
        $this->salt = md5(uniqid(rand(), true));
      }

      $this->{$field} = sha1($this->salt . $this->{$field});
    }
  }

  public function login()
  {
    $uname = $this->username;
    $u = new User();
    $u->where('username', $uname)->get();
    $this->salt = $u->salt;
    $this->validate()->get();
    if ($this->exists()) {
      return true;
    } else {
      $this->error_message('login', 'Username or password invalid');
      $this->username = $uname;
      return false;
    }
  }
}
