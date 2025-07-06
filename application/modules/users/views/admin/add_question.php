<section class="content-header">
  <h1>
    <i class="fa fa-user"></i>Add Questionaire's : <?php echo $user->first_name ;?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="users/admin/users"><i class="fa fa-user"></i> User</a></li>
    <li class="active">Add Questionnaire</li>
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
              <?php foreach ($questions as $q): ?>
              <tr>
                <td>
                  <?php echo $q->title; ?>
                </td>
                <td>
                  <?php echo date('d M Y - H:i:s', strtotime($user->created)); ?>
                </td>
                <td style="width:1%; white-space:nowrap; text-align:right;">
                <!-- <a class="btn btn-default btn-sm" href="users/admin/users/add/<?php echo $user->id; ?>/<?php echo $q->id; ?>">Add Questionnaires</a> -->
                <?php if (isset($questions_added[$q->id])): ?>
                  <a class="btn btn-danger btn-sm" href="users/admin/users/remove/<?php echo $user->id; ?>/<?php echo $q->id; ?>">Unassign Questionnaires</a>
                <?php else: ?>
                  <a class="btn btn-success btn-sm" href="users/admin/users/add/<?php echo $user->id; ?>/<?php echo $q->id; ?>">Assign Questionnaires</a>
                <?php endif; ?>
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