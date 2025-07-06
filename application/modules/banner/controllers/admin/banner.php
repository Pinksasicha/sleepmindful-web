<?php

class Banner extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
	{
        
        $data['img'] = $this->db->order_by('id', 'asc')->get('banner')->result();
        // $data['banner'] = new Banner();
        // print_r($data); die;
        // print_r($this->db->last_query()); die;
        $this->template->build('admin/index',$data);
        
    }

    public function form()
    {
        $this->db->get('banner')->result();
        $this->template->build('admin/form');
    }
    
    public function save()
    {
        $config['upload_path'] = './uploads/banner';
   $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '2048000'; // max size in KB
   $config['max_width'] = '20000'; //max resolution width
   $config['max_height'] = '20000';  //max resolution height
   // load CI libarary called upload
   $this->load->library('upload', $config);
   // body of if clause will be executed when image uploading is failed
   if(!$this->upload->do_upload()){
    $errors = array('error' => $this->upload->display_errors());
    // This image is uploaded by deafult if the selected image in not uploaded
    $image = 'no_image.png';    
   }
   // body of else clause will be executed when image uploading is succeeded
   else{
    $data = array('upload_data' => $this->upload->data());
    $image = $_FILES['userfile']['name'];  //name must be userfile

    // assign the data to an array
  $data = array(
    'id' => $this->input->post('id'),
    
    'image' => $image
   );
   //insert image to the database
   $this->db->insert('banner', $data);
    
   }
   
   set_notify('success', lang('save_data_complete'));
            redirect('banner/admin/banner');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('banner');
        set_notify('success', lang('delete_data_complete'));
        redirect($_SERVER['HTTP_REFERER']);
    }

}