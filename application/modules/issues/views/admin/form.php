<section class="content-header">
	<h1><i class="fa fa-file-text-o"></i> Issue</h1>
</section>

<form action="issues/admin/issues/save/<?php echo $issue->id; ?>" method="POST" enctype="multipart/form-data">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body pad">
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" placeholder="Name" class="form-control" value="<?php echo htmlentities($issue->title);?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="footer-action">
		<button class="btn btn-primary pull-right" type="submit">Save</button>
		<a class="btn btn-default" href="javascript:history.back();">back</a>
	</div>
</form>