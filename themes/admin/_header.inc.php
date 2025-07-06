<div class="navbar">
	<div class="navbar-inner">
		<ul class="nav pull-right">
			<li id="fat-menu" class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-user"></i> <?php //echo user()->username ?>
					<i class="icon-caret-down"></i>
				</a>

				<ul class="dropdown-menu">
					<li><a tabindex="-1" href="users/admin/profiles">My Account</a></li>
					<li class="divider"></li>
					<li><a tabindex="-1" class="visible-phone" href="#">Settings</a></li>
					<li class="divider visible-phone"></li>
					<li><a tabindex="-1" href="users/admin/auth/logout">Logout</a></li>
				</ul>
			</li>

		</ul>
		<a class="brand" href="home"><span class="first">JaxJax</span> <span class="second">API</span></a>
	</div>
</div>