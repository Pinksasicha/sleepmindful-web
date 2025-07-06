<section id=contact>
  <h1>CONTACT US</h1>
  <form id="form-contact" action="contacts/save" method="post">
    <div class="form-group">
      <label for="formControlIssue">Please choose your issue below</label>
      <?php echo form_dropdown('issue', get_option('title', 'title', 'issues', 'order by sequence asc,id desc'), null, 'class="form-control input-text"', 'Choose your issue below'); ?>
    </div>
    <div class="row mb-3">
      <div class="form-group col-lg-6">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control input-text" name="first_name">
      </div>
      <div class="form-group col-lg-6">
        <label>Surname</label>
        <input type="text" class="form-control input-text" name="last_name">
      </div>
      <div class="form-group col-lg-6">
        <label>Email</label>
        <input type="email" class="form-control input-text" name="email">
      </div>
      <div class="form-group col-lg-6">
        <label>Mobile</label>
        <input type="text" class="form-control input-text" name="mobile">
      </div>
    </div>
    <div class="text-center">
      <button type="submit" class="button">Submit</button>
    </div>
  </form>
</section>
<script>
  $(function() {
    <?php if ($this->session->flashdata('thankyou')): ?>
    swal({
      title: "Thank you",
      text: "We have received your issue",
      type: "success",
      confirmButtonColor: "#60C9E3",
      confirmButtonText: "Close"
    });
    <?php endif; ?>
    $('#form-contact').submit(function() {
      var issue = $.trim($('#form-contact select[name="issue"] option:selected').val());
      var first_name = $.trim($('#form-contact input[name="first_name"]').val());
      var last_name = $.trim($('#form-contact input[name="last_name"]').val());
      var email = $.trim($('#form-contact input[name="email"]').val());
      var mobile = $.trim($('#form-contact input[name="mobile"]').val());

      if (issue == "") {
        prettyAlert('Please choose your issue', $('#form-contact select[name="issue"]'));
        return false;
      }

      if (first_name == "") {
        prettyAlert('Please enter your name', $('#form-contact input[name="first_name"]'));
        return false;
      }

      if (last_name == "") {
        prettyAlert('Please enter your surname', $('#form-contact input[name="last_name"]'));
        return false;
      }

      if (email == "") {
        prettyAlert('Please enter your email', $('#form-contact input[name="email"]'));
        return false;
      }

      if (!email.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i)) {
        prettyAlert('Please enter valid email', $('#form-contact input[name="email"]'));
        return false;
      }

      if (mobile == "") {
        prettyAlert('Please enter your mobile', $('#form-contact input[name="mobile"]'));
        return false;
      }


    })
  });
</script>