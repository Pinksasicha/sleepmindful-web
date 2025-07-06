<?php

class Media extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index($activity_id)
	{
        $data['activity'] = new Activity($activity_id);
		$data['medias'] = new Activity_media();
		$data['medias']->where('activity_id',$activity_id);
		$data['medias']->order_by('sequence asc,id desc')->get();
		$this->template->build('admin/media/index',$data);
	}
	
	public function form($activity_id,$id = NULL)
	{
        $data['activity'] = new Activity($activity_id);
		$data['media'] = new Activity_media($id);
		$this->template->build('admin/media/form',$data);
	}
	
	public function save($activity_id,$id = NULL)
	{
		if($_POST)
        {
            $media = new Activity_media($id);
            $media->from_array($_POST);
            $media->activity_id = $activity_id;
            if($_FILES['thumbnail']['name'])
			{
				$media->delete_file('uploads/activity_media/','thumbnail');
				$media->thumbnail = $media->upload($_FILES['thumbnail'],'uploads/activity_media/',250,250);
			}
			if($_FILES['image']['name'])
			{
				$media->delete_file('uploads/activity_media/','image');
				$media->image = $media->upload($_FILES['image'],'uploads/activity_media/',933,498);
			}
			$media->save();
			set_notify('success', lang('save_data_complete'));
            redirect('activities/admin/media/index/'.$activity_id);
        }
	}
	
	public function delete($id)
	{
		$media = new Activity_media($id);
		$media->delete();
		set_notify('success', lang('delete_data_complete'));
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	public function sequence()
	{
    	foreach($this->input->post('media') as $key => $id)
    	{
        	$media = new Activity_media($id);
        	$media->sequence = $key+1;
        	$media->save();
    	}
	}
}