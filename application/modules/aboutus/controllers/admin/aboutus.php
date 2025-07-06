<?php

class Aboutus extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index()
    {
        $data['aboutus'] = $this->db->order_by('id')->get('aboutus')->result();
        $this->template->build('admin/index',$data);
    }

    public function form($id = null)
    {
        $data['aboutus'] = $this->db->where('id',$id)->get('aboutus')->result();
        // print_r($this->db->last_query()); die;
        $this->template->build('admin/form', $data);
    }

    public function update($id = null)
    {
   $config['upload_path'] = './uploads/aboutus';
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
    $img = $_FILES['userfile']['name'];  //name must be userfile
    $cont = $_POST['content'];

    // assign the data to an array
    $data = array(
    'content' => $cont,
    'image' => $img
     );
    //update and data image to the database
    //    $this->db->where('id',$id)->replace('aboutus', $data);
    $this->db->where('id', $id);
    $this->db->update('aboutus', $data);
//    print_r($this->db->last_query()); die;
      }

     //content
     $cont = $_POST['content'];

     // assign the data to an array
     $data = array(
     'content' => $cont
       );
   
     //update and data image to the database

      $this->db->where('id', $id);
      $this->db->update('aboutus', $data);
   
      set_notify('success', lang('save_data_complete'));
      redirect('aboutus/admin/aboutus');
    }

}
