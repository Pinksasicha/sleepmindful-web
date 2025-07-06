<!DOCTYPE html>
<html>

<head>
  <base href="<?php echo base_url(); ?>" />
  <meta charset="UTF-8">
  <title>SleepMindFul - Backoffice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.4 -->
  <link rel="stylesheet" href="themes/admin/asset/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="themes/admin/asset/plugins/datepicker/datepicker3.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="themes/admin/asset/plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="themes/admin/asset/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="themes/admin/asset/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="themes/admin/asset/css/custom.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  <!-- jQuery 2.1.4 -->
  <script src="themes/admin/asset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="themes/admin/asset/plugins/jQueryUI/jquery-ui.min.js"></script>
  <!-- Bootstrap 3.3.4 -->
  <script src="themes/admin/asset/bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="themes/admin/asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="themes/admin/asset/plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="themes/admin/asset/dist/js/app.min.js"></script>
  <script src="media/js/holder.js"></script>
  <script src="themes/admin/asset/plugins/bootbox/bootbox.min.js"></script>
  <script src="themes/admin/asset/plugins/datepicker/bootstrap-datepicker.js"></script>
  <script src="themes/admin/asset/plugins/select2/select2.full.min.js"></script>
  <script>
    $(function() {
      $('.delete-link').click(function() {
        url = $(this).attr('href');
        bootbox.confirm({
          size: 'small',
          message: "Are you sure to delete this item ?",
          className: 'modal modal-danger',
          callback: function(result) {
            if (result) {
              window.location = url;
            }
          }
        })
        return false;
      })
    });
  </script>
  <?php echo $template['metadata']; ?>
</head>

<body class="skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>M</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>S</b>leepMindFul</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
      </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo admin()->avatar(); ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo admin()->display; ?>
            </p>
            <a href="administrators/profile">Edit Profile</a>
          </div>
        </div>

        <?php include '_menu.inc.php'; ?>
        <script>
          $(function() {
            $(".sidebar-menu li.active").parents(".treeview,.treeview-menu").addClass('active').slideDown(function() {
              $.AdminLTE.layout.fix();
            });
          })
        </script>
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php echo $template['body']; ?>
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 1.0.0
      </div>
      <strong>Copyright &copy; <?php echo date('Y'); ?></strong> All rights reserved.
    </footer>


  </div><!-- ./wrapper -->


</body>

</html>