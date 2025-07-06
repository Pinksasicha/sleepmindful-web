<?php

class Administrators extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['admins'] = new Administrator();
		$data['admins']->get_page();
		$this->template->build('admin/index',$data);
	}

	public function form($id = NULL)
	{
		$data['admin'] = new Administrator($id);
		$this->template->build('admin/form',$data);
	}

	public function save($id = NULL)
	{
		if($_POST)
		{
			if(empty($_POST['password']))unset($_POST['password']);
			$admin = new Administrator($id);
			$admin->from_array($_POST);
			if($_FILES['avatar']['name'])
			{
				$admin->delete_file('uploads/administrator/','avatar');
				$admin->avatar = $admin->upload($_FILES['avatar'],'uploads/administrator/',100,100);
			}
			$admin->save();
			set_notify('success', lang('save_data_complete'));
			redirect('administrators');
		}
	}

	public function delete($id)
	{
		if($id)
		{
			$admin = new Administrator($id);
			$admin->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
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
	
	public function check($field)
	{
    	$admin = new Administrator();
    	$admin->where($field,$this->input->get($field))->get();
    	if($admin->exists())
    	{
        	echo 'false';
    	}
    	else
    	{
        	echo 'true';
    	}
    	
	}

}

?>