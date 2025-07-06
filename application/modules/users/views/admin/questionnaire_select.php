<section class="content-header">
  <h1>
    <i class="fa fa-user"></i> Questionaire's <?php echo $user->first_name . ' ' . $user->last_name; ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="users/admin/users"><i class="fa fa-user"></i> User</a></li>
    <li class="active">Questionnaire</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-body">

          <table class="table table-condensed">
            <thead>
              <tr>
                <th>Title</th>
                <th>CreatedAt</th>
                <th>จำนวน</th>
                <th class="text-center">Repeat</th>
                <th></th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($questions as $question): ?>
              <tr>
                <td>
                  <?php echo $question->title; ?>
                </td>
                <td>
                  <?php echo date('d M Y - H:i:s', strtotime($user->created)); ?>
                </td>
                <!-- <td><?php echo $question->count;?></td> -->
                <td><?php echo isset($question_count[$question->question_list_id][0]->count) ? $question_count[$question->question_list_id][0]->count: 0; ?></td>
                <td style="width:1%; white-space:nowrap; text-align:right;">
                <?php if ($question->status == 'on'): ?>
                  <input type="checkbox"  onclick='window.location.assign("users/admin/users/selectOff/<?php echo $user->id; ?>/<?php echo $question->question_list_id; ?>")' <?php echo $question->status == 'on' ? ' checked' : ''; ?>/>
                <?php else: ?>
                  <input type="checkbox"  onclick='window.location.assign("users/admin/users/selectOn/<?php echo $user->id; ?>/<?php echo $question->question_list_id; ?>")' />
                <?php endif; ?>
                </td>
                <td></td>
                <td style="width:1%; white-space:nowrap; text-align:right;">
                <a class="btn btn-default btn-sm <?php if($question->total_unrecommend > 0) { echo 'btn-warning'; } ?>" href="users/admin/users/questionnaire/<?php echo $user->id; ?>/<?php echo $question->question_list_id; ?>">
                    Result
                </a>
                <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>users/admin/users/toggleOn/<?php echo $user->id; ?>/<?php echo $question->question_list_id; ?>">on</a>
                <a class="btn btn-default btn-sm" href="<?php echo base_url(); ?>users/admin/users/toggleOff/<?php echo $user->id; ?>/<?php echo $question->question_list_id; ?>">off</a>
                <input type="checkbox" data-width="100" disabled data-toggle="toggle" <?php echo $question->status_s == 'on' ? ' checked' : ''; ?>>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
 <!-- Style to set the size of checkbox -->
<style> 
        input.largerCheckbox { 
            width: 20px; 
            height: 20px; 
        } 
</style>

<style type="text/css">
  .onoff{
    height: 10px;
    padding:2px 5px;
    color:#fff;
    border-radius: 5px;
    width:70px;
    text-align: center;
    margin-bottom: :20px;
    margin-top:20px;
  }
  .onoff-on:before{
    content: 'ON';
  }
  .onoff-off:before{
    content: 'OFF';
  }
  .onoff-on{
    background-color: #00a65a;
    border-color: #008d4c;
    border-right: 30px solid #ddd;
    cursor: pointer;
  }
  .onoff-off{
    background-color: #f56954;
    border-color: #f4543c;
    border-left: 30px solid #ddd;
    cursor: pointer;
  }

</style>