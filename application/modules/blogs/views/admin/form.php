<section class="content-header">
	<h1><i class="fa fa-file-text-o"></i> Blog</h1>
</section>

<form action="blogs/admin/blogs/save/<?php echo $blog->id; ?>" method="POST" enctype="multipart/form-data">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body pad">
						<div class="form-group">
							<?php if ($blog->thumbnail_path()): ?>
							<img class="img-responsive" src="<?php echo $blog->thumbnail_path(); ?>" style="height: 200px;">
							<?php endif; ?>
							<label>Thumbnail (430x430)</label>
							<input type="file" name="thumbnail">
						</div>
						<div class="form-group">
							<?php if ($blog->banner_path()): ?>
							<img class="img-responsive" src="<?php echo $blog->banner_path(); ?>" style="height: 200px;">
							<?php endif; ?>
							<label>Banner (1280x720)</label>
							<input type="file" name="banner">
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" name="title" placeholder="Name" class="form-control" value="<?php echo htmlentities($blog->title);?>">
						</div>
						<div class="form-group">
							<label>Detail</label>
							<textarea name="detail" rows="10" class="form-control"><?php echo $blog->detail; ?></textarea>
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
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
	$(function() {
		CKEDITOR.config.allowedContent = true;
		CKEDITOR.config.contentsCss = ['<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css',
			'<?php echo base_url(); ?>assets/css/stylesheet.css',
		];
		CKEDITOR.config.baseHref = '<?php echo base_url(); ?>';

		CKEDITOR.replace('detail', {
			filebrowserBrowseUrl: '<?php echo base_url(); ?>media/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=sleepmindful',
			filebrowserUploadUrl: '<?php echo base_url(); ?>media/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=sleepmindful',
			filebrowserImageBrowseUrl: '<?php echo base_url(); ?>media/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=sleepmindful'
		});
	});
</script>