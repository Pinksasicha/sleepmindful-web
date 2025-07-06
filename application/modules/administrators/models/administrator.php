<?php

class Administrator extends ORM
{	
    var $validation = array(

        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => array('required', 'trim', 'min_length' => 3, 'encrypt')
        ),
        array(
            'field' => 'username',
            'label' => 'Email Address',
            'rules' => array('required', 'trim', 'unique')
        )
    );

	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
	function _encrypt($field)
    {
        // Don't encrypt an empty string
        if (!empty($this->{$field}))
        {
            // Generate a random salt if empty
            if (empty($this->salt))
            {
                $this->salt = md5(uniqid(rand(), true));
            }

            $this->{$field} = sha1($this->salt . $this->{$field});
        }
    }

	function login()
    {
        $uname = $this->username;
        $u = new Administrator();
        $u->where('username', $uname)->get();
        $this->salt = $u->salt;
        $this->validate()->get();
        if ($this->exists())
        {
            return TRUE;
        }
        else
        {
            $this->error_message('login', 'Username or password invalid');
            $this->username = $uname;
            return FALSE;
        }
    }

	function token()
	{
		return md5($this->id.'maharapp');
	}

	function avatar()
	{
		if(!empty($this->avatar))
		{
			return 'uploads/administrator/'.$this->avatar;
		}
		else
		{
    		return 'themes/admin/asset/images/default-avatar.png';
		}
		return false;
	}

}

?>