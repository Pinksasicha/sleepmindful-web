<section id="register">
  <div class="container">
    <h1>Register</h1>
    <form id="form-register" action="users/action_register" method="post">
      <div class="row">
        <div class="form-group col-lg-6">
          <label>Name</label>
          <input type="text" class="form-control input-text" name="first_name">
        </div>
        <div class="form-group col-lg-6">
          <label for="">Surname</label>
          <input type="text" class="form-control input-text" name="last_name">
        </div>
        <div class="form-group col-lg-6">
          <label>Gender</label>
          <select class="form-control input-text" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="form-group col-lg-6">
          <label>Date ASQ Completed</label>
          <input type="text" class="form-control input-text datepicker" name="asq_date">
        </div>
      </div>
      <h2>Body</h2>
      <div class="row">
        <div class="form-group col-lg-6">
          <label>Weight</label>
          <div class="input-group">
            <input type="text" class="form-control input-text bmi-cal allownumericwithdecimal" name="weight">
            <div class="text-append">
              <span>lbs</span>
            </div>
          </div>
        </div>
        <div class="form-group col-6 col-lg-3">
          <label>Height</label>
          <div class="input-group">
            <input type="text" class="form-control input-text bmi-cal allownumericwithoutdecimal" name="feet">
            <div class="text-append">
              <span>Feet</span>
            </div>
          </div>
        </div>
        <div class="form-group col-6 col-lg-3">
          <label>&nbsp;</label>
          <div class="input-group">
            <input type="text" class="form-control input-text bmi-cal allownumericwithoutdecimal" name="inch">
            <div class="text-append">
              <span>Inches</span>
            </div>
          </div>
        </div>
      </div>
      <div id="bmi">
        <div class="form-group">
          <label>BMI</label>
          <div class="bmi-value">-</div>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-lg-6">
          <label for="">Username</label>
          <input type="text" class="form-control input-text" name="username">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-lg-6">
          <label for="">Password</label>
          <input type="password" class="form-control input-text" name="password">
        </div>
        <div class="form-group col-lg-6">
          <label for="">Confirm Password</label>
          <input type="password" class="form-control input-text" name="confirm_password">
        </div>
        <div class="form-group col-lg-6">
          <label for="">E-mail</label>
          <input type="email" class="form-control input-text" name="email">
        </div>
        <div class="form-group col-lg-6">
          <label for="">Mobile Number</label>
          <input type="text" class="form-control input-text allownumericwithoutdecimal" name="mobile">
        </div>
      </div>
      <div class="text-center p-3">
        <button type="submit" class="button blue-gradient-30 mx-1 btn-submit">Confirm</button>
        <button type="reset" class="button-white blue-gradient-30 mx-1">Cancel</button>
      </div>
    </form>
  </div>
</section>
<script>
  $(function() {
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
    });
    $('select').selectpicker();
    <?php if ($this->session->flashdata('thankyou')): ?>
    swal({
      title: "Thank you",
      text: "We have received your issue",
      type: "success",
      confirmButtonColor: "#60C9E3",
      confirmButtonText: "Close"
    });
    <?php endif; ?>
    function accessBMI() {
      var feet = $.trim($('#form-register input[name="feet"]').val());
      var weight = $.trim($('#form-register input[name="weight"]').val());
      if (feet != "" && weight != "") {
        var inch = $.trim($('#form-register input[name="inch"]').val()) != '' ? $.trim($('#form-register input[name="inch"]').val()) : 0;
        var heightInInches = (feet * 12) + parseInt(inch);
        var weightInPounds = parseFloat(weight);
        var calcBMI = ((weightInPounds * 703) / (heightInInches * heightInInches)).toFixed(2);
      } else {
        calcBMI = '-';
      }
      $('.bmi-value').text(calcBMI);
    }
    $('.bmi-cal').on("keypress keyup blur", function() {
      accessBMI();
    })
    $(".allownumericwithdecimal").on("keypress keyup blur", function(event) {
      $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
      if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    $(".allownumericwithoutdecimal").on("keypress keyup blur", function(event) {
      $(this).val($(this).val().replace(/[^\d].+/, ""));
      if ((event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });

    $('.btn-submit').click(function() {

      var first_name = $.trim($('#form-register input[name="first_name"]').val());
      var last_name = $.trim($('#form-register input[name="last_name"]').val());
      var gender = $.trim($('#form-register select[name="gender"] option:selected').val());
      var asq_date = $.trim($('#form-register input[name="asq_date"]').val());
      var weight = $.trim($('#form-register input[name="weight"]').val());
      var height = $.trim($('#form-register input[name="feet"]').val());

      var username = $.trim($('#form-register input[name="username"]').val());
      var password = $.trim($('#form-register input[name="password"]').val());
      var confirm_password = $.trim($('#form-register input[name="confirm_password"]').val());
      var email = $.trim($('#form-register input[name="email"]').val());
      var mobile = $.trim($('#form-register input[name="mobile"]').val());

      if (first_name == "") {
        prettyAlert('Please enter your Name', $('#form-register input[name="first_name"]'));
        return false;
      }

      if (last_name == "") {
        prettyAlert('Please enter your Surname', $('#form-register input[name="last_name"]'));
        return false;
      }

      if (asq_date == "") {
        prettyAlert('Please enter your Date ASQ Completed', $('#form-register input[name="asq_date"]'));
        return false;
      }

      if (weight == "") {
        prettyAlert('Please enter your Weight', $('#form-register input[name="weight"]'));
        return false;
      }

      if (height == "") {
        prettyAlert('Please enter your Height', $('#form-register input[name="feet"]'));
        return false;
      }

      if (username == "") {
        prettyAlert('Please enter your Username', $('#form-register input[name="username"]'));
        return false;
      }

      if (password == "") {
        prettyAlert('Please enter your Password', $('#form-register input[name="password"]'));
        return false;
      }

      if (password != confirm_password) {
        prettyAlert('Password and confirm password is not match', $('#form-register input[name="confirm_password"]'));
        return false;
      }

      if (email == "") {
        prettyAlert('Please enter your email', $('#form-register input[name="email"]'));
        return false;
      }

      if (!email.match(/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i)) {
        prettyAlert('Please enter valid email', $('#form-register input[name="email"]'));
        return false;
      }

      if (mobile == "") {
        prettyAlert('Please enter your mobile', $('#form-register input[name="mobile"]'));
        return false;
      }
      $(this).prop('disabled', true);
      $(this).text('loading...');
      $.get('/users/check', {
        "username": username,
        "email": email
      }, function(data) {
        data = $.parseJSON(data);
        if (data.status) {
          $('#form-register').submit();
        } else {
          prettyAlert(data.msg);
        }
        $('.btn-submit').prop('disabled', false);
        $('.btn-submit').text('Confirm');
      })

      return false;
    })
  });
</script>