<section class="content-header">
  <h1>Question List</h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">&nbsp;</h3>
          <div class="box-tools">
            <a class="btn btn-success btn-sm" href="questionnaires/admin/questions"><i class="fa fa-question"></i> New Question</a>
            <a class="btn btn-success btn-sm" href="questionnaires/admin/score"><i class="fa fa-list-ul"></i> New Score Question</a>
          </div>
        </div>
        <div class="box-body no-padding">
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Type</th>
                <th>CreatedAt</th>
                <th style="width: 160px;"></th>
              </tr>
            </thead>
            <tbody id="sortable">
              <?php foreach ($questions as $key => $question):?>
              <tr id="question-<?php echo $question->id; ?>">
                <td>
                  <?php echo number_key($key); ?>
                </td>
                <td>
                  <?php echo $question->title; ?>
                </td>
                <td>
                  <?php echo $question->type(); ?>
                </td>
                <td>
                  <?php echo date('d/m/Y H:i:s', strtotime($question->created)); ?>
                </td>
                <td class="text-right" style="white-space: nowrap;">
                <!-- <a class="btn btn-warning btn-sm" href="questionnaires/admin/questions/select/<?php echo $question->id; ?>">Select User</a> -->
                  <?php if ($question->type == 'score_question'): ?>
                  <a class="btn btn-default btn-sm" href="questionnaires/admin/answer/index/<?php echo $question->id; ?>"><i class="fa fa-list-ul"></i> Score Answer</a>
                  <a class="btn btn-primary btn-sm" href="questionnaires/admin/score/index/<?php echo $question->id; ?>">Edit</a>
                  <?php else: ?>
                  <a class="btn btn-primary btn-sm" href="questionnaires/admin/questions/index/<?php echo $question->id; ?>">Edit</a>
                  <?php endif; ?>

                  <a class="btn btn-danger btn-sm delete-link" href="questionnaires/admin/questions/delete/<?php echo $question->id; ?>">Delete</a>
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