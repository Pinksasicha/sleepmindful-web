<section class="content-header">
	<h1><i class="fa fa-user"></i> User Information</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-primary">
				<div class="box-body">
					<table class="table">
						<tr>
							<th>Name</th>
							<td>
								<?php echo $user->first_name; ?>
							</td>
						</tr>
						<tr>
							<th>Surname</th>
							<td>
								<?php echo $user->last_name; ?>
							</td>
						</tr>
						<tr>
							<th>Gender</th>
							<td>
								<?php echo ucfirst($user->gender); ?>
							</td>
						</tr>
						<tr>
							<th>Date ASQ Completed</th>
							<td>
								<?php echo date('d M Y', strtotime($user->asq_date)); ?>
							</td>
						</tr>
						<tr>
							<th>Weight</th>
							<td>
								<?php echo $user->weight; ?> lbs
							</td>
						</tr>
						<tr>
							<th>Height</th>
							<td>
								<?php echo $user->height; ?> feet
							</td>
						</tr>
						<tr>
							<th>Username</th>
							<td>
								<?php echo $user->username; ?>
							</td>
						</tr>
						<tr>
							<th>Email</th>
							<td>
								<?php echo $user->email; ?>
							</td>
						</tr>
						<tr>
							<th>Mobile Number</th>
							<td>
								<?php echo $user->mobile; ?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="footer-action">
	<a class="btn btn-default pull-right" onclick="javascript:history.back();">Back</a>
</div>