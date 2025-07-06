<?php

class Questionnaires extends Public_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!is_login()) {
      redirect('login');
    }
  }

  public function index($result_token = null)
  {
    $question = new Score_question(1);
    $data['questions'] = json_decode($question->data);
    $data['score_user'] = false;
    if ($result_token) {
      $data['score_user'] = new Score_user();
      $data['score_user']->where('md5(id) = "' . $result_token . '"')->get();
    }

    $this->template->build('index', $data);
  }

  public function save($id)
  {
    $question_list = new Question_list($id);
    $question = $question_list->question();

    $answer = $question->score_answer;

    $user_answer = $this->input->post('a');
    $questions = json_decode($question->data, true);
    $answers = json_decode($answer->data, true);
    $total = 0;
    foreach ($user_answer as $index => $a) {
      $total += $questions[$index]['choice'][$a]['score'];
    }
    foreach ($answers as $ans) {
      if (($total >= $ans['min']) && ($total <= $ans['max'])) {
        $result = $ans['text'];
        break;
      }
    }

    $score_user = new Score_user();
    $score_user->question_list_id = $id;
    $score_user->user_id = user()->id;
    $score_user->data = json_encode($this->input->post('a'));
    $score_user->question = $question->data;
    $score_user->answer = $answer->data;
    $score_user->total_score = $total;
    $score_user->result = $result;
    $score_user->count = '1';
    $score_user->save();
    $this->db->set('status','off')->where('question_list_id',$id)->where('user_id',user()->id)->update('question_status');
    redirect('questionnaires/result/' . md5($score_user->id));
  }

  public function sst()
  {
    $question = new Question(1);
    $data['questions'] = json_decode($question->data);
    $this->template->build('sst', $data);
  }

  public function sst_save($id)
  {
    // echo '<pre>';
    // print_r($_POST['a']);
    // echo '</pre>';
    $question_list = new Question_list($id);
    $question = $question_list->question();

    $score_user = new Question_user();
    $score_user->question_list_id = $id;
    $score_user->user_id = user()->id;
    $score_user->data = json_encode($this->input->post('a'));
    $score_user->question = $question->data;
    $score_user->count = '1';
    $score_user->save();
    $this->db->set('status','off')->where('question_list_id',$id)->where('user_id',user()->id)->update('question_status');
    redirect('questionnaires/result2/' . md5($score_user->id));
  }

  public function result2($result_token)
  {
    $user = new Question_user();
    $user->where('md5(id) = "' . $result_token . '"')->get();

    $data['questions'] = json_decode($user->question);
    $data['user_answers'] = json_decode($user->data, true);
    $this->template->build('result2', $data);
  }

  public function test($id)
  {
    $question_list = new Question_list($id);
    $question = $question_list->question();
    $data['questions'] = json_decode($question->data);
    $data['question_list'] = $question_list;
    if ($question_list->type == 'question') {
      $this->template->build('sst', $data);
    } else {
      $this->template->build('index', $data);
    }
  }

  public function view($id)
  {
    $data['question_list'] = new Question_list($id);
    if ($data['question_list']->type == 'question') {
      $data['qq'] = new Question_user();
      $data['qq']
    ->where('question_list_id', $id)
    ->where('user_id', user()->id)
    ->order_by('id asc')
    ->get();
	foreach($data['qq'] as $t)
	{
		$data['questions'][$t->id] = json_decode($t->question);
		$data['user_answers'][$t->id] = json_decode($t->data, true);
    $data['recommend'][$t->id] = $t->recommend;
  }
  
    // $question_list = new Question_list($id);
    // $question = $question_list->question();
    // $data['questions'] = json_decode($question->data);
    // $data['question_list'] = $question_list;
    // if ($question_list->type == 'question') {
    //   $user = new Question_user();
    //   $user
    //   ->where('user_id', user()->id)
    //   ->where('question_list_id', $id)
    //   ->order_by('id', 'desc')
    //   ->limit(1)
    //   ->get();

    //   $data['questions'] = json_decode($user->question);
    //   $data['user_answers'] = json_decode($user->data, true);
    //   $data['recommend'] = $user->recommend;
      $this->template->build('question_view', $data);
    } else {
      $data['score_users'] = new Score_user();
      $data['score_users']
      ->where('user_id', user()->id)
      ->where('question_list_id', $id)
      ->order_by('id', 'asc')
      ->get();

      foreach($data['score_users'] as $t)
      {
        $data['questions'][$t->id] = json_decode($t->question);
        $data['user_answers'][$t->id] = json_decode($t->data, true);
        $data['recommend'][$t->id] = $t->recommend;
      }

      $this->template->build('view', $data);
    }
  }
}
