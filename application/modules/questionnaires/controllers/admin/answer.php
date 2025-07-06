<?php

class Answer extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index($id = null)
  {
    $question_list = new Question_list($id);
    $question = new Score_question($question_list->question_id);
    $answer = $question->score_answer;
    $data['a_json'] = $answer->data;
    $data['question'] = $question_list;
    $this->template->build('admin/answer', $data);
  }

  public function save($id = null)
  {
    $question_list = new Question_list($id);
    $question = new Score_question($question_list->question_id);

    $answer = new Score_answer();
    $answer->get_by_score_question_id($question->id);
    $answer->score_question_id = $question->id;
    $answer->data = json_encode($this->input->post('a'));
    $answer->save();
    set_notify('success', lang('save_data_complete'));
    redirect('questionnaires/admin/question_lists');
  }
}
