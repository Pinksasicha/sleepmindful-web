<?php

class Questions extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index($id = null)
  {
    $question_list = new Question_list($id);
    $question = new Question($question_list->question_id);
    $data['q_json'] = $question->data;
    $data['question'] = $question_list;
    $this->template->build('admin/question', $data);
  }

  public function save($id = null)
  {
    $question_list = new Question_list($id);
    $question_list->title = $this->input->post('title');
    $question_list->type = 'question';
    $question_list->question_list_status = 'on';
    $question_list->save();

    $question = new Question($question_list->question_id);
    $question->data = json_encode($this->input->post('q'));
    $question->save();

    $question_list->question_id = $question->id;
    $question_list->save();

    set_notify('success', lang('save_data_complete'));
    redirect('questionnaires/admin/question_lists');
  }

  public function delete($id)
    {
        $question = new Question_list($id);
        $question->delete();
        $this->db->where('question_list_id', $id);
        $this->db->delete('question_status');
        set_notify('success', lang('delete_data_complete'));
        redirect($_SERVER['HTTP_REFERER']);
    }

  public function select($qid)
  {
    $data['users'] = new User();
    $data['users']->order_by('id', 'desc');
    $data['users']->get_page();

    $data['questions'] = new Question_list($qid);
    $test = $this->db->where('status','on')->get('question_status')->result();
    $data['tt'] = $test;
    // $data['user'] = new User();
    // $data['user'] = $this->db->where('id',$id)->get('users')->result();

    $this->template->build('admin/select_user', $data);
  }

  public function select_user($id,$qid){
    $data = array(
      'question_list_id' => $qid,
      'user_id' => $id,
      'status' => 'on'
    );
    $this->db->insert('question_status',$data);
    // print_r($this->db->last_query()); die;
    set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
    
  }

}
