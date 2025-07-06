<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>

  <li <?php echo menu_active('administrators'); ?>>
    <a href="administrators">
      <i class="fa  fa-user-secret"></i> <span>Administrator</span>
    </a>
  </li>
  <li <?php echo menu_active('blogs'); ?>>
    <a href="blogs/admin/blogs">
      <i class="fa fa-list-alt"></i> <span>Blog</span>
    </a>
  </li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-send-o"></i> <span>Contact Us</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li <?php echo menu_active('issues'); ?>><a href="issues/admin/issues"><i class="fa fa-list"></i> Issue</a></li>
      <li <?php echo menu_active('contacts'); ?>><a href="contacts/admin/contacts"><i class="fa fa-file-text-o"></i> Contact List</a></li>
    </ul>
  </li>
  <li <?php echo menu_active('posts'); ?>>
    <a href="posts/admin/posts">
      <i class="fa fa-newspaper-o"></i> <span>News</span>
    </a>
  </li>
  <li <?php echo menu_active('questions'); ?>>
    <a href="questionnaires/admin/question_lists">
      <i class="fa fa-question"></i> <span>Question</span>
    </a>
  </li>
  <!-- <li <?php echo menu_active('questions'); ?>>
  <a href="questionnaires/admin/questions">
    <i class="fa fa-question"></i> <span>Question Maker</span>
  </a>
  </li>
  <li <?php echo menu_active('score'); ?>>
    <a href="questionnaires/admin/score">
      <i class="fa fa-list-ul"></i> <span>Score Question Maker</span>
    </a>
  </li>
  <li <?php echo menu_active('answer'); ?>>
    <a href="questionnaires/admin/answer">
      <i class="fa fa-list-ol"></i> <span>Score Answer</span>
    </a>
  </li> -->
  <li <?php echo menu_active('users'); ?>>
    <a href="users/admin/users">
      <i class="fa fa-user"></i> <span>User</span>
    </a>
  </li>
  <li <?php echo menu_active('banner'); ?>>
    <a href="banner/admin/banner">
      <i class="fa fa-flag"></i> <span>Banner</span>
    </a>
  </li>
  <li <?php echo menu_active('aboutus'); ?>>
    <a href="aboutus/admin/aboutus">
      <i class="fa fa-bookmark"></i> <span>About us</span>
    </a>
  </li>
  <li <?php echo menu_active('referral'); ?>>
    <a href="referral/admin/referral">
    <i class="fa fa-file-text-o"></i> <span>Referral Form</span>
    </a>
  </li>
  <li>
    <a href="admin/logout">
      <i class="fa fa-sign-out"></i> <span>Logout</span>
    </a>
  </li>
</ul>
</section>
<!-- /.sidebar -->