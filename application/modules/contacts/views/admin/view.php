<section class="content-header">
	<h1>Contact Detail</h1>
</section>

<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<form action="contacts/admin/contacts/save/<?php echo $contact->id; ?>" method="post">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">
							&nbsp;
						</h3>
					</div>
					<div class="box-body">
						<table class="table table-striped table-bordered">
							<tr>
								<th>Issue</th>
								<td><?php echo $contact->issue; ?>
								</td>
							</tr>
							<tr>
								<th>Firstname</th>
								<td><?php echo $contact->first_name; ?>
								</td>
							</tr>
							<tr>
								<th>Lastname</th>
								<td><?php echo $contact->last_name; ?>
								</td>
							</tr>
							<tr>
								<th>Mobile</th>
								<td><?php echo $contact->mobile; ?>
								</td>
							</tr>
							<tr>
								<th>E-mail</th>
								<td><?php echo $contact->email; ?>
								</td>
							</tr>

							<tr>
								<th>Created</th>
								<td><?php echo mysql_to_th($contact->created, 'S', true); ?>
								</td>
							</tr>
							<tr>
								<th>IP Address</th>
								<td><?php echo $contact->ip_address; ?>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
<div class="footer-action">
	<a class="btn btn-default pull-right" href="javascript:history.back();">back</a>
</div>