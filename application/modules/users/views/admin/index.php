<section class="content-header">
  <h1><i class="fa fa-user"></i> User</h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <form class="form-inline pull-left" id="form-filter">
            <div class="input-group">
              <input type="text" class="form-control" name="s" placeholder="Search" value="<?php echo $this->input->get('s'); ?>">
              <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-search"></i></button>
              </span>
            </div>
          </form>
          <a href="users/admin/users/export<?php echo ($this->input->get('s')) ? '?s=' . $this->input->get('s') : ''; ?>" class="btn btn-success pull-left" style="margin-left:5px;"><i class="fa fa-file-excel-o"></i> Export</a>
        </div>

        <div class="box-body">

          <table class="table table-condensed">
            <thead>
              <tr>
                <th style="width: 30px">#</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Mobile</th>
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
                <a class="btn btn-default btn-sm" href="users/admin/users/add_question/<?php echo $user->id; ?>">Assign Questionnaire</a>
                <a class="btn btn-default btn-sm" href="users/admin/users/questionnaire_select/<?php echo $user->id; ?>">Status</a>
                  <?php if ($user->question_user->exists() || $user->score_user->exists()): ?>
                  <a class="btn btn-default btn-sm" href="users/admin/users/questionnaire_index/<?php echo $user->id; ?>">PDF Report</a>
                  <?php endif; ?>
                  <a class="btn btn-default btn-sm" href="users/admin/users/view/<?php echo $user->id; ?>">Profile</a>
                  <a class="btn btn-danger btn-sm" href="users/admin/users/delete/<?php echo $user->id; ?>">Delete</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="box-footer">
          <?php echo $users->pagination(); ?>
        </div>
      </div>
    </div>
  </div>
</section>