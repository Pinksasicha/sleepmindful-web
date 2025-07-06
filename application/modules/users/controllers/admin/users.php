<?php

class Users extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function report($user_id, $question_list_id)
  {
    require_once APPPATH . 'libraries/tcpdf/tcpdf.php';

    $data['question_list'] = new Question_list($question_list_id);
    $data['user'] = new User($user_id);
    if ($data['question_list']->type == 'question') {
      $data['qq'] = new Question_user();
      $data['qq']
    ->where('question_list_id', $question_list_id)
    ->where('user_id', $user_id)
    ->order_by('id asc')
    ->get();

	foreach($data['qq'] as $t)
	{
		$data['questions'][$t->id] = json_decode($t->question);
		$data['user_answers'][$t->id] = json_decode($t->data, true);
    $data['recommend'][$t->id] = $t->recommend;
  }
    // if ($data['question_list']->type == 'question') {
    //   $question_user = new Question_user();
    //   $question_user
    // ->where('question_list_id', $question_list_id)
    // ->where('user_id', $user_id)
    // ->order_by('id desc')
    // ->limit(1)->get();

    //   $data['questions'] = json_decode($question_user->question);
    //   $data['user_answers'] = json_decode($question_user->data, true);
    //   $data['recommend'] = $question_user->recommend;
      $data['created_at'] = date('d M Y', strtotime($data['qq']->created));
      $html = $this->load->view('admin/question_report', $data, true);
    } else {
      $data['score_users'] = new Score_user();
      $data['score_users']->where('question_list_id', $question_list_id)->where('user_id', $user_id)->order_by('id asc')->get();
      $data['recommend'] = $data['score_users']->recommend;
      $data['created_at'] = date('d M Y', strtotime($data['score_users']->created));
      $html = $this->load->view('admin/score_report', $data, true);
    }

    // $data['user'] = new User($id);
    // $question_user = new Question_user();
    // $question_user->where('user_id', $id)->order_by('id desc')->limit(1)->get();

    // $data['questions'] = json_decode($question_user->question);
    // $data['user_answers'] = json_decode($question_user->data, true);
    // $data['recommend'] = $question_user->recommend;

    // $data['score_user'] = new Score_user();
    // $data['score_user']->where('user_id', $id)->order_by('id desc')->limit(1)->get();
    // $data['created_at'] = date('d M Y', strtotime($data['score_user']->created));
    //$html = $this->load->view('admin/report', $data, true);

    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);

    $pdf->SetFont('freeserif', '', 10);

    // add a page
    $pdf->AddPage();

    // output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->lastPage();

    // ---------------------------------------------------------

    //Close and output PDF document
    $pdf->Output(time() . '.pdf', 'D');
  }

  public function index()
  {
    $data['users'] = new User();
    
    if ($this->input->get('s')) {
      $data['users']->or_like('first_name', '%' . $this->input->get('s') . '%');
      $data['users']->or_like('last_name', '%' . $this->input->get('s') . '%');
      $data['users']->or_where('mobile', $this->input->get('s'));
      $data['users']->or_where('email', $this->input->get('s'));
    }
    $data['users']->order_by('id', 'desc');
    $data['users']->get_page();
    $this->template->build('admin/index', $data);
  }

  public function view($id)
  {
    $data['user'] = new User($id);
    $this->template->build('admin/view', $data);
  }

  public function delete($id)
  {
    $user = new User($id);
    $user->delete();
    set_notify('success', lang('delete_data_complete'));
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function questionnaire($user_id, $question_list_id)
  {
    $data['question_list'] = new Question_list($question_list_id);
    $data['user'] = new User($user_id);
    if ($data['question_list']->type == 'question') {
      $data['qq'] = new Question_user();
      $data['qq']
    ->where('question_list_id', $question_list_id)
    ->where('user_id', $user_id)
    ->order_by('id asc')
    ->get();

	foreach($data['qq'] as $t)
	{
		$data['questions'][$t->id] = json_decode($t->question);
		$data['user_answers'][$t->id] = json_decode($t->data,true);
		$data['recommend'][$t->id] = $t->recommend;
	}
    // print_r($data['qq']->question);die;
    // $question_user = new Question_user();
    //   $question_user
    // ->where('question_list_id', $question_list_id)
    // ->where('user_id', $user_id)
    // ->order_by('id asc')
    // ->limit(1)->get();

    // print_r($this->db->last_query()); die;
    // $question_user
    // $data['question']
      
      // $data['questions'] = json_decode($data['qq']->question);
      // $data['user_answers'] = json_decode($data['qq']->data, true);
      // print_r($data['qq']->data); die;
      // $data['questionz'] = new Question_user();
      // $data['questionz']->where('question_list_id', $question_list_id)->where('user_id', $user_id)->order_by('id asc')->get();
      // $data['recommend'] = $data['qq']->recommend;
      
      // print_r($this->db->last_query()); die;
      // print_r($data['questions']);die;
      $this->template->build('admin/questionnaire_view', $data);
    } else {
      $data['score_user'] = new Score_user();
      $data['score_user']->where('question_list_id', $question_list_id)->where('user_id', $user_id)->order_by('id asc')->get();
      // print_r($this->db->last_query()); die;
      $data['recommend'] = $data['score_user']->recommend;
      // print_r($data['recommend']);die;
      $this->template->build('admin/questionnaire_score_view', $data);
    }
  }

  public function addrec($user_id, $question_list_id,$q_key)
  {
    $data = array(
      'recommend' => $this->input->post('recommend')
      
    );
    
    $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->where('id',$q_key)->update('question_users',$data);
    // print_r($this->db->last_query()); die;
		set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function toggleOn($user_id, $question_list_id)
  {
    // $this->db->where('user_id', $user_id)->where('question_list_id',$question_list_id)->set('status', 'a')->update('score_users');
    // $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->set('status','on')->update('score_users');
    // $this->db->where('id',$question_list_id)->set('question_list_status','on')->update('question_lists');
    $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->set('status_s','on')->update('question_status');

		set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function toggleOff($user_id, $question_list_id)
  {
    // $this->db->where('user_id', $user_id)->where('question_list_id',$question_list_id)->set('status', 'a')->update('score_users');
    // $this->db->where('id',$question_list_id)->set('question_list_status','off')->update('question_lists');
    $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->set('status_s','off')->update('question_status');

		set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function toggle3($user_id, $question_list_id)
  {
    $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->set('status','off')->update('score_users');

    set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function test($user_id, $question_list_id)
  {
    $data['te'] = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',$question_list_id)->get()->result();
    // print_r($this->db->last_query()); die;
    // print_r($data); die;
		set_notify('success','completex');
    redirect('users/admin/users/questionnaire_index/' . $user_id);
    $this->template->build('admin/questionnaire_index', $data);
  }

  public function questionnaire_index($user_id,$question_list_id = null)
  {
    $data['user'] = new User($user_id);
    $data['questions'] = new Question_list();
    $data['questions']->order_by('sequence', 'asc')->get();
    $data['quest'] = $this->db->select('*')->from('question_lists')->join('question_status','question_lists.id = question_status.question_list_id','left')->where('question_status.user_id',$user_id)->get()->result();
    // $mains = $this->db->select_sum('count')->from('score_users')->where('user_id',15)->where('question_list_id',5)->get()->result();
    $mains = $this->db->select_sum('count')->from('score_users')->where('id',$user_id)->get()->result();
    // print_r($this->db->last_query()); die;
    // $mains = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',$question_list_id)->get()->result();
    $data['main'] = $mains;

    // $status = $this->db->where('user_id',$user_id)->get('score_users')->result();
    // $data['test'] = $status;
    
    // $data['a'] = $this->db->where('user_id',$user_id)->get('score_users')->result();
    // $data['sum'] = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',5)->get()->result();
    // print_r($data['main']); die;
    // print_r($this->db->last_query()); die;


    $this->template->build('admin/questionnaire_index', $data);
  }

  public function recommend_save($user_id, $question_list_id)
  {
    $data['question_list'] = new Question_list($question_list_id);

    if ($data['question_list']->type == 'question') {
      $question_user = new Question_user();
      $question_user
      ->where('question_list_id', $question_list_id)
      ->where('user_id', $user_id)
      ->order_by('id desc')
      ->limit(1)
      ->get();
    } else {
      $question_user = new Score_user();
      $question_user
      ->where('question_list_id', $question_list_id)
      ->where('user_id', $user_id)
      ->order_by('id asc')
      ->get();
      // print_r($this->db->last_query()); die;
      $this->template->build('admin/questionnaire_score_view', $data);
    }
    $question_user->recommend = $this->input->post('recommend');
    $question_user->save();
    set_notify('success', lang('save_data_complete'));
    redirect('users/admin/users/questionnaire_select/' . $user_id);
  }

  public function recommend_save1($user_id,$question_list_id,$score_user)
  {
    $data['question_list'] = new Question_list($question_list_id);

    if ($data['question_list']->type == 'question') {

      $question_user = new Question_user();
      $question_user
      ->where('id', $score_user)
      ->order_by('id asc')
      ->get();

    } else {

      $question_user = new Score_user();
      $question_user
      ->where('id', $score_user)
      ->order_by('id asc')
      ->get();

    //   $recommend = $_POST['recommend'];

    //   $data = array(
    //     'recommend' => $recommend
    //     );

    // $this->db->where('id',$score_user);
    // $this->db->update('score_users', $data);

      // print_r($this->db->last_query()); die;
      $this->template->build('admin/questionnaire_score_view', $data);
    }
    $question_user->recommend = $this->input->post('recommend');
    $question_user->save();
    set_notify('success', lang('save_data_complete'));
    redirect('users/admin/users/questionnaire_select/' . $user_id);
    // redirect($_SERVER['HTTP_REFERER']);

  }

  public function recommend_save2($user_id,$question_list_id,$question)
  {
    $data['question_list'] = new Question_list($question_list_id);

    if ($data['question_list']->type == 'question') {

      $question_user = new Question_user();
      $question_user
      ->where('id', $question)
      ->order_by('id asc')
      ->get();

    } else {

      // $question_user = new Score_user();
      // $question_user
      // ->where('id', $score_user)
      // ->order_by('id asc')
      // ->get();

    //   $recommend = $_POST['recommend'];

    //   $data = array(
    //     'recommend' => $recommend
    //     );

    // $this->db->where('id',$score_user);
    // $this->db->update('score_users', $data);

      // print_r($this->db->last_query()); die;
      $this->template->build('admin/questionnaire_score_view', $data);
    }
    $question_user->recommend = $this->input->post('recommend');
    $question_user->save();
    set_notify('success', lang('save_data_complete'));
    redirect('users/admin/users/questionnaire_select/' . $user_id);
    // redirect($_SERVER['HTTP_REFERER']);

  }

  public function addRecommend($user_id, $question_list_id,$score_user)
  {
    $data['score_users'] = $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->where('id',$score_user)->get('score_users')->result();
    // print_r($this->db->last_query()); die;
    $this->template->build('admin/add_recommend',$data);
  }
  
  public function addRecommend_q($user_id, $question_list_id)
  {
    $data['questions'] = $this->db->select('*')->from('question_lists')->join('question_users','question_users.question_list_id = question_lists.id','left')->where('question_users.user_id',$user_id)->where('question_users.question_list_id',$question_list_id)->get()->result();
    // print_r($this->db->last_query()); die;
    $this->template->build('admin/add_recommend_q',$data);
  }

  public function add_recomment_question($user_id, $question_list_id,$question)
  {
    $data['questions'] = $this->db->select('*')->from('question_lists')->join('question_users','question_users.question_list_id = question_lists.id','left')->where('question_users.user_id',$user_id)->where('question_users.question_list_id',$question_list_id)->where('question_users.id',$question)->get()->result();
    $this->template->build('admin/add_recomment_question',$data);
  }

  public function export()
  {
    $users = new User();
    if ($this->input->get('s')) {
      $users->or_like('first_name', '%' . $this->input->get('s') . '%');
      $users->or_like('last_name', '%' . $this->input->get('s') . '%');
      $users->or_where('mobile', $this->input->get('s'));
      $users->or_where('email', $this->input->get('s'));
    }

    $users->order_by('id desc')->get();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=user' . time() . '.csv');
    $output = fopen('php://output', 'w');
    fwrite($output, "\xEF\xBB\xBF");
    fputcsv($output, ['#', 'Name', 'Surname', 'Gender', 'Date ASQ Completed', 'Weight (lbs)', 'Height (feet)', 'Username', 'Email', 'Mobile Number']);
    $i = 0;
    foreach ($users as $user) {
      fputcsv($output, [++$i, $user->first_name, $user->last_name, $user->gender, $user->asq_date, $user->weight, $user->height, $user->username, $user->email, $user->mobile]);
    }
  }

  public function questionnaire_select($user_id)
  {
    $data['user'] = new User($user_id);
    $sql = "";
    $sql .= "select  ";
    $sql .= "  id, title, created, question_list_id, status, status_s,";
    $sql .= "    sum(case when recommend is null then 1 else 0 end) as total_unrecommend ";
    $sql .= "from ( ";
    $sql .= "    select  ";
    $sql .= "        ql.id, ql.title, ql.created, qs.question_list_id, qs.status, qs.status_s,";
    $sql .= "        IFNULL(qu.recommend, su.recommend) as recommend ";
    $sql .= "    from question_lists ql  ";
    $sql .= "    left join question_status qs on qs.question_list_id = ql.id  ";
    $sql .= "    left join score_users su on qs.question_list_id = su.question_list_id and su.user_id = qs.user_id ";
    $sql .= "    left join question_users qu on qs.question_list_id = qu.question_list_id and qu.user_id = qs.user_id ";
    $sql .= "    where qs.user_id = ".$user_id." ";
    $sql .= " ) detail ";
    $sql .= " group by id, title, created, question_list_id, status, status_s";

    $data['questions'] = $this->db->query($sql)->result();
    // $data['questions'] = $this->db->select('*')->from('question_lists')->join('question_status','question_lists.id = question_status.question_list_id','left')->where('question_status.user_id',$user_id)->get()->result();
    
    // if ($data['question_list']->type == 'question') {
    //   $data['questions'] = 
    //   $this->db
    //   ->select('*')
    //   ->select_sum('score_users.count')
    //   ->from('question_lists')
    //   ->join('question_status','question_lists.id = question_status.question_list_id','left')
    //   ->join('score_users','score_users.question_list_id = question_lists.id')
    //   ->where('question_status.user_id',$user_id)
    //   ->where('score_users.user_id',$user_id)
    //   ->group_by('score_users.question_list_id')
    //   ->get()
    //   ->result();
    // }else {
    //   $data['questions'] = 
    //   $this->db
    // ->select('*')
    // ->select_sum('question_users.count')
    // ->from('question_lists')
    // ->join('question_status','question_lists.id = question_status.question_list_id','left')
    // ->join('question_users','question_users.question_list_id = question_lists.id')
    // ->where('question_status.user_id',$user_id)
    // ->where('question_users.user_id',$user_id)
    // ->group_by('question_users.question_list_id')
    // ->get()
    // ->result();
    // }
    
    // $data['questions'] = 
    // $this->db
    // ->select('*')
    // ->select_sum('score_users.count')
    // ->from('question_lists')
    // ->join('question_status','question_lists.id = question_status.question_list_id','left')
    // ->join('score_users','score_users.question_list_id = question_lists.id')
    // ->where('question_status.user_id',$user_id)
    // ->where('score_users.user_id',$user_id)
    // ->group_by('score_users.question_list_id')
    // ->get()
    // ->result();
    // print_r($this->db->last_query()); die;
    // $mains = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->group_by('question_list_id')->get()->result();
    $data['test'] = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->group_by('question_list_id')->get()->result();
    // $mains = $this->db->select("count(user_id)")->from('score_users')->where('user_id',$user_id)->group_by('question_list_id')->get()->result();
    // print_r($this->db->last_query()); die;
    // print_r($mains);die;
    // $data['main'] = $mains;

    // $data['questions']->order_by('sequence', 'asc')->get();
    // $data['questions'] = $this->db->select('*')->from('question_lists')->join('score_users','score_users.question_list_id = question_lists.id','left')->get()->result();
    // $data['questions'] = $this->db->select('*')->from('score_users')->join('question_lists','question_lists.id = score_users.question_list_id')->where('score_users.user_id',$user_id)->order_by('question_lists.sequence', 'asc')->get()->result();
    // $data['questions'] = $this->db->select('question_lists.*','score_users.*')->from('question_lists')->join('score_users','question_lists.id=score_users.question_list_id','inner')->get()->result();
    // print_r($this->db->last_query()); die;
	
	$data['question_count'] = [];
	foreach($data['questions'] as $q)
	{
		$temp = new Question_list($q->question_list_id);
		if ($temp->type == 'question') {
			$data['question_count'][$q->question_list_id] = $this->db->select_sum('count')->from('question_users')->where('user_id',$user_id)->where('question_list_id',$q->question_list_id)->get()->result();
		}
		else {
			$data['question_count'][$q->question_list_id] = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',$q->question_list_id)->get()->result();
		}
	}
	
    $this->template->build('admin/questionnaire_select', $data);
  }

  public function viewCount($user_id,$question_list_id)
  {
    $data['question_list'] = new Question_list($question_list_id);
    if ($data['question_list']->type == 'question') {
      $data['counts'] = $this->db->select_sum('count')->from('question_users')->where('user_id',$user_id)->where('question_list_id',$question_list_id)->get()->result();
    }else {
      $data['counts'] = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',$question_list_id)->get()->result();
    }
    // $data['counts'] = $this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',$question_list_id)->get()->result();
    // print_r($this->db->last_query()); die;
    $this->template->build('admin/viewCount',$data);
  }

  public function selectOn($user_id, $question_list_id)
  {
    // $this->db->where('user_id', $user_id)->where('question_list_id',$question_list_id)->set('status', 'a')->update('score_users');
    $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->set('status','on')->update('question_status');
    // $this->db->where('id',$question_list_id)->set('question_list_status','on')->update('question_lists');
    // print_r($this->db->last_query()); die;

		set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function selectOff($user_id, $question_list_id)
  {
    // $this->db->where('user_id', $user_id)->where('question_list_id',$question_list_id)->set('status', 'a')->update('score_users');
    $this->db->where('user_id',$user_id)->where('question_list_id',$question_list_id)->set('status','off')->update('question_status');
    // $this->db->where('id',$question_list_id)->set('question_list_status','off')->update('question_lists');
    // print_r($this->db->last_query()); die;

		set_notify('success','complete');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function add_question($user_id)
  {
    $data['user'] = new User($user_id);
    // $data['questions'] = new Question_list();
    // $data['questions']->order_by('sequence', 'asc')->get();
    $data['questions'] = $this->db->select('question_lists.title,question_lists.id,question_status.status_question')
    ->distinct()->from('question_lists')->join('question_status','question_status.question_list_id = question_lists.id','left')->get()->result();
    // $data['questions'] = $this->db->select('*')->from('question_lists')->join('question_status','question_lists. = question_status.id','left outer')->where('question_status.user_id',$user_id)->get()->result();
    // print_r($this->db->last_query()); die;
	
	$questions_added = $this->db->where('user_id',$user_id)->get('question_status')->result();
	$data['questions_added'] = [];
	foreach($questions_added as $q)
	{
		$data['qq'] = new Question_user();
	    $data['qq']
			->where('question_list_id', $question_list_id)
			->where('user_id', $user_id)
			->order_by('id asc')
			->get();
		if($data['qq'])
			$data['questions_added'][$q->question_list_id] = 1;
	}
	
    $this->template->build('admin/add_question', $data);
  }
  
  public function remove($user_id,$question_list_id)
  {
	if($this->db->select_sum('count')->from('score_users')->where('user_id',$user_id)->where('question_list_id',$question_list_id)->group_by('question_list_id')->get()->result())
	{
	  set_notify('error','This questionaire has been done');
      redirect($_SERVER['HTTP_REFERER']);
	}
	else
	{
	  $this->db->delete('question_status', array('question_list_id' => $question_list_id, 'user_id' => $user_id));
      set_notify('success','Unassign questionaire complete');
      redirect($_SERVER['HTTP_REFERER']);
	}
  }

  public function add($user_id,$question_list_id)
  {
    if($this->db->where('question_list_id',$question_list_id)->where('user_id',$user_id)->get('question_status')->result()) {
      set_notify('error','This questionaire has been added');
      redirect($_SERVER['HTTP_REFERER']);
    }
    else {
      $data = array(
        'question_list_id' => $question_list_id,
        'user_id' => $user_id,
        'status' => 'def',
        'status_s' => 'on',
        'status_question' => '1'
      );
      
      $this->db->insert('question_status',$data);
      // print_r($this->db->last_query()); die;
      set_notify('success','Assign questionaire complete');
      redirect($_SERVER['HTTP_REFERER']);
    }
    
  }
  

}
