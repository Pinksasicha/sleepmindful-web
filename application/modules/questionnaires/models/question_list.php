<?php

class Question_list extends ORM
{
  public function __construct($id = null)
  {
    parent::__construct($id);
  }

  public function type()
  {
    if ($this->type == 'question') {
      return 'Question';
    }
    return 'Score Question';
  }

  public function question()
  {
    if ($this->type == 'question') {
      $question = new Question($this->question_id);
    } else {
      $question = new Score_question($this->question_id);
    }
    return $question;
  }

  public function tested($user = null)
  {
    if ($user || is_login()) {
      if (!$user) {
        $user = user();
      }
      if ($this->type == 'question') {
        $answer = new Question_user();
        $answer->where('user_id', $user->id);
        $answer->where('question_list_id', $this->id);
        $answer->get();
        if ($answer->exists()) {
          return true;
        }
        return false;
      } else {
        $answer = new Score_user();
        $answer->where('user_id', $user->id);
        $answer->where('question_list_id', $this->id);
        $answer->get();
        if ($answer->exists()) {
          return true;
        }
        return false;
      }
    }
    return false;
  }

  // public function tested_count()
  // {
  //   $count = 0;
  //   if (is_login()) {
  //     $answer = new Question_user();
  //     $answer->select('question_list_id');
  //     $answer->distinct();
  //     $answer->where('user_id', user()->id);
  //     $answer->where('question_list_id is not null')->get();
  //     $count += $answer->result_count();
  //     $answer = new Score_user();
  //     $answer->select('question_list_id');
  //     $answer->distinct('question_list_id');
  //     $answer->where('user_id', user()->id);
  //     $answer->where('question_list_id is not null')->get();
  //     $count += $answer->result_count();
  //   }
  //   return $count;
  // }

  public function tested_count()
  {
    $count = 0;
    if (is_login()) {
      $answer = new Question_status();
      $answer->select('question_list_id');
      $answer->distinct();
      $answer->where('user_id', user()->id);
      $answer->where('status','off');
      $answer->where('status_s','on');
      $answer->get();
      // print_r($this->db->last_query()); die;
      $count += $answer->result_count();
    }
    return $count;
  }

  public function c()
  {
    $count = 0;
    if (is_login()) {
      $answer = new Question_status();
      $answer->select('question_list_id');
      $answer->distinct();
      $answer->where('status_s','on');
      $answer->where('user_id', user()->id);
      $answer->where('question_list_id is not null')->get();
      // print_r($this->db->last_query()); die;
      $count += $answer->result_count();
      // print_r($count); die;
      
    }
    return $count;
  }
  
}
