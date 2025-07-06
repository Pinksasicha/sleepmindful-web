<?php

class Score extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index($id = null)
  {
    $question_list = new Question_list($id);

    $question = new Score_question($question_list->question_id);
    $data['q_json'] = $question->data;
    $data['question'] = $question_list;
    $this->template->build('admin/index', $data);
  }

  public function save($id = null)
  {
    $question_list = new Question_list($id);
    $question_list->title = $this->input->post('title');
    $question_list->type = 'score_question';
    $question_list->status = 'on';
    $question_list->save();

    $question = new Score_question($question_list->question_id);
    $question->data = json_encode($this->input->post('q'));
    $question->save();

    $question_list->question_id = $question->id;
    $question_list->save();
    set_notify('success', lang('save_data_complete'));
    redirect('questionnaires/admin/question_lists');
  }
}
