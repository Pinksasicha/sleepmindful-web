<?php

class Profile extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['admin'] = new Administrator($this->session->userdata('id'));
		$this->template->build('profile/index',$data);
	}


	public function save()
	{
		if($_POST)
		{
			if(empty($_POST['password']))unset($_POST['password']);
			$admin = new Administrator($this->session->userdata('id'));
			$admin->from_array($_POST);
			if($_FILES['avatar']['name'])
			{
				$admin->delete_file('uploads/administrator','avatar');
				$admin->avatar = $admin->upload($_FILES['avatar'],'uploads/administrator/',160,160);
			}
			$admin->save();
			set_notify('success', lang('save_data_complete'));
			redirect('administrators/profile');
		}
	}

	public function delete_avatar($id)
	{
		$admin = new Administrator($id);
		$admin->delete_file('uploads/users','avatar');
		$admin->avatar = '';
		$admin->save();
		set_notify('success', lang('remove_image_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}

}

?>