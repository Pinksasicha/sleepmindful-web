<?php
    
class Activities extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['wrapper_id'] = 'activity-page';
		$data['banner'] = new Photo(7);
        $data['activities'] = new Activity();
		$data['activities']->order_by('sequence asc,id desc')->get_page(6);
		if($this->input->get('page'))
        {
            if($this->input->get('page') > $data['activities']->paged->total_pages)
            {
                return false;
            }
        }
		$this->template->build('index',$data);
    }
    
    public function view($id)
	{
        $data['wrapper_id'] = 'activity-page';
        $data['activity'] = new Activity($id);
        $data['medias'] = new Activity_media();
		$data['medias']->where('activity_id',$id)->order_by('sequence asc,id desc')->get();
		$this->template->set_metadata('og:title',$data['activity']->title,'facebook');
		$this->template->set_metadata('og:description',$data['activity']->intro(200),'facebook');
		$this->template->set_metadata('og:image',base_url().$data['activity']->thumbnail_path(),'facebook');
		$this->template->set_metadata('og:url',$data['activity']->permanent_url(),'facebook');
		$this->template->build('view',$data);
	}
}