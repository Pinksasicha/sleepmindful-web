<section id="login-page">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 blue-gradient-bg">
        <div class="login-content">
          <!-- <div class="logo-card">
            <img class="img-fluid" src="assets/images/logo.png" alt="SleepMindFul Logo">
          </div> -->
          <div class="container" style="bottom: 20px;position: relative;">
            <img src="assets/images/Desktop/SleepMindFul_Banner.png" alt="SleepMindFul_Banner" width="120" class="center">
           </div>
          <h2>EXCELLENT HEALTH CARE SERVICES</h2>
          <h1><span>WELCOME TO</span>
            SLEEPMINDFUL</h1>
        </div>
      </div>
      <div class="col-lg-6 light-gradient-bg">
        <div class="form-login-container">
          <h3>
            Welcome, Please login<br>
            to your account
          </h3>
          <form id="form-login" action="users/action_login" method="post">
            <div class="form-group">
              <label for="username">User Name/Email Address</label>
              <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <div class="text-center">
              <button type="submit" class="button-gradient my-4">Login</button>
              <div>Don’t have an account ? <a href="register">Register</a></div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(function() {
    <?php if ($this->session->flashdata('login_error')): ?>
    swal({
      title: "",
      text: "username or password invalid",
      type: "error",
      confirmButtonColor: "#60C9E3",
      confirmButtonText: "Close"
    });
    <?php endif; ?>
  });
</script>