<?php
Class Home extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['set_id'] = (!empty($_GET['set']))?$_GET['set']:1;
		$data['highlights'] = new highlight();
		$data['highlights']->where('set_id', $data['set_id'])->order_by('priority', 'asc')->get();
		$this->template->build('admin/index',$data);
	}

	public function form($id=NULL)
	{
		$data['highlight'] = new Highlight($id);

		$dest = new Destination();
		$dest->where('country_id', $data['highlight']->hotel->destination->country_id)->where('status','open')->get();
		if($data['highlight']->hotel->destination->country_id){
			foreach($dest as $value){
				$data['destinations'][$value->id] = $value->name;
			}
		} else {
			$data['destinations'][0] = '';
		}

		$hotel = new Hotel();
		$hotel->where('destination_id',$data['highlight']->hotel->destination_id)->where('active','yes')->get();
		if($data['highlight']->hotel->destination_id){
			foreach($hotel as $value){
				$data['hotels'][$value->id] = $value->name;
			}
		} else {
			$data['hotels'][0] = '';
		}
		$this->template->build('admin/form',$data);
	}

	public function save($id=null){
		if($_POST){
			$highlight = new Highlight($id);
			$highlight->from_array($_POST);
			if($_FILES['image']['name'])
			{
				$highlight->delete_file('uploads/highlight/','image');
				$highlight->image = $highlight->upload($_FILES['image'],'uploads/highlight/','1600','623');
			}
			$highlight->save();
			set_notify('success', lang('save_data_complete'));
			redirect('home/admin/home');
		}
	}

	public function delete($id=NULL){
		$highlight = new Highlight($id);
		$highlight->delete();
		set_notify('error','Delete highlight complete.');
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function get_destination($country_id = NULL)
	{
		$data['destinations'] = new Destination();
		$data['destinations']->where('country_id', $country_id)->where('status','open')->get();
		$places[0] = 'Select destination';
		if($data['destinations']->exists() && $country_id){
			foreach($data['destinations'] as $dest){
				$places[$dest->id] = $dest->name;
			}
		}
		echo form_dropdown($name = 'destination_id', $places,'', 'id="destination"');
	}

	public function get_hotel($destination_id = NULL)
	{
		$data['hotels'] = new Hotel();
		$data['hotels']->where('destination_id',$destination_id)->where('active','yes')->get();
		$list_hotel = array();
		if($data['hotels']->exists() && $destination_id){
			foreach($data['hotels'] as $hotel){
				$list_hotel[$hotel->id] = $hotel->name;
			}
		}
		echo form_dropdown($name = 'hotel_id', $list_hotel,'', 'id="hotel"','Select hotel');
	}
	
	public function sorting_highlight(){
		foreach($_POST['priority'] as $index=>$id){
			$highlight = new highlight($id);
			$highlight->priority = $index+1;
			$highlight->save();
		}
		echo "จัดเรียง priority เรียบร้อยแล้ว";
	}
	
	public function delete_image($id){
		$highlight = new Highlight($id);
		$highlight->delete_file('uploads/highlight/','image');
		$highlight->image = '';
		$highlight->save();
		set_notify('error','Delete image complete.');
		redirect($_SERVER['HTTP_REFERER']);
	}
}