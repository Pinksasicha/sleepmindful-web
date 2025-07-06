<?php

class Activities extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['activities'] = new Activity();
		$data['activities']->order_by('sequence asc,id desc')->get();
		$this->template->build('admin/index',$data);
	}
	
	public function form($id = NULL)
	{
		$data['activity'] = new Activity($id);
		$this->template->build('admin/form',$data);
	}
	
	public function save($id = NULL)
	{
		if($_POST)
        {
            $activity = new Activity($id);
            $activity->from_array($_POST);
            if($_FILES['thumbnail']['name'])
			{
				$activity->delete_file('uploads/activity/','thumbnail');
				$activity->thumbnail = $activity->upload($_FILES['thumbnail'],'uploads/activity/',250,250);
			}
			if($_FILES['banner']['name'])
			{
				$activity->delete_file('uploads/activity/','banner');
				$activity->banner = $activity->upload($_FILES['banner'],'uploads/activity/',1100,550);
			}
			$activity->save();
			set_notify('success', lang('save_data_complete'));
            redirect('activities/admin/activities');
        }
	}
	
	public function delete($id)
	{
		$activity = new Activity($id);
		$activity->delete();
		set_notify('success', lang('delete_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function sequence()
	{
    	foreach($this->input->post('activity') as $key => $id)
    	{
        	$activity = new Legend($id);
        	$activity->sequence = $key+1;
        	$activity->save();
    	}
	}
}