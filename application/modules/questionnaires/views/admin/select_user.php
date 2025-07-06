<section class="content-header">
  <h1><?php foreach ($questions as $question): ?>
    <i class="fa fa-user"></i> Questionaire's <?php echo $question->title; ?>
  </h1><?php endforeach; ?>
  <ol class="breadcrumb">
    <li><a href="users/admin/users"><i class="fa fa-user"></i> User</a></li>
    <li class="active">Questionnaire Select</li>
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
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $key => $user): ?>
              <tr>
                <td>
                  <?php echo number_key($key); ?>.</td>
                <td>
                  <?php echo $user->first_name . ' ' . $user->last_name; ?>
                </td>
                <td>
                  <?php echo $user->email; ?>
                </td>
                <td>
                  <?php echo $user->mobile; ?>
                </td>
                <td>
                  <?php echo date('d M Y - H:i:s', strtotime($user->created)); ?>
                </td>
                <td style="width:1%; white-space:nowrap; text-align:right;">
                <a class="btn btn-default btn-sm" href="questionnaires/admin/questions/select_user/<?php echo $user->id; ?>/<?php echo $question->id; ?>">Add Questionnaires</a>
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