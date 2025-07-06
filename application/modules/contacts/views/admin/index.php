<section class="content-header">
  <h1>Contact List</h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <div class="clearfix">
            <form class="form-inline pull-left" id="form-filter">
              <div class="input-group">
                <input type="text" class="form-control" name="s" placeholder="Search" value="<?php echo $this->input->get('s'); ?>">
                <span class="input-group-btn">
                  <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-search"></i></button>
                </span>
              </div>
            </form>

            <a href="contacts/admin/contacts/export" class="btn btn-success pull-left" style="margin-left:5px;"><i class="fa fa-file-excel-o"></i> Export</a>
          </div>
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
                <th style="width: 120px">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($contacts as $key => $contact): ?>
              <tr>
                <td>
                  <?php echo $key + 1; ?>.</td>
                <td>
                  <?php echo $contact->first_name . ' ' . $contact->last_name; ?>
                </td>
                <td>
                  <?php echo $contact->email; ?>
                </td>
                <td>
                  <?php echo $contact->mobile; ?>
                </td>
                <td>
                  <?php echo date('d/m/Y H:i:s',strtotime($contact->created)); ?>
                </td>
                <td>
                  <a class="btn btn-default btn-sm" href="contacts/admin/contacts/view/<?php echo $contact->id; ?>">View</a>
                  <a class="btn btn-danger btn-sm delete-link" href="contacts/admin/contacts/delete/<?php echo $contact->id; ?>">Delete</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="box-footer text-center">
          <?php echo $contacts->pagination(' pagination-sm no-margin'); ?>
        </div>
      </div>
    </div>
  </div>
</section>