<section class="content-header">
    <h1><i class="fa fa-file-text-o"></i> Activity</h1>
</section>

<form action="activities/admin/activities/save/<?php echo $activity->id; ?>" method="POST" enctype="multipart/form-data">
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Misc</h3>
                </div>
	            <div class="box-body pad">
		            <div class="form-group">
			            <?php if($activity->thumbnail_path()): ?>
        				<img class="img-responsive" src="<?php echo $activity->thumbnail_path(); ?>" style="height: 200px;">
			            <?php endif; ?>
			            <label>Thumbnail (250x250)</label>
		            	<input type="file" name="thumbnail">
		            </div>
		            <div class="form-group">
			            <?php if($activity->banner_path()): ?>
        				<img class="img-responsive" src="<?php echo $activity->banner_path(); ?>" style="height: 200px;">
			            <?php endif; ?>
			            <label>Banner (1100x550)</label>
		            	<input type="file" name="banner">
		            </div>
	            </div>
        	</div>
        	<div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thai</h3>
                </div>
	            <div class="box-body pad">
		            <div class="form-group">
			            <label>Title</label>
		            	<input type="text" name="title_th" placeholder="Name" class="form-control" value="<?php echo htmlentities($activity->title_th);?>">
		            </div>
		            <div class="form-group">
    		            <label>Detail</label>
					    <textarea name="detail_th" rows="10" class="form-control"><?php echo $activity->detail_th; ?></textarea>
					</div>
	            </div>
        	</div>
        	<div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">English</h3>
                </div>
	            <div class="box-body pad">
		            <div class="form-group">
			            <label>Title</label>
		            	<input type="text" name="title_en" placeholder="title" class="form-control" value="<?php echo htmlentities($activity->title_en);?>">
		            </div>
		            <div class="form-group">
    		            <label>Detail</label>
					    <textarea name="detail_en" rows="10" class="form-control"><?php echo $activity->detail_en; ?></textarea>
					</div>
	            </div>
        	</div>
	        
        </div>
    </div>
</section>
<div class="footer-action">
    <button class="btn btn-primary pull-right" type="submit">Save</button>
</div>
</form>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
$(function () {
    CKEDITOR.config.allowedContent = true;
	CKEDITOR.config.contentsCss = ['<?php echo base_url(); ?>assets/fonts/stylesheet.css',
	'<?php echo base_url(); ?>assets/css/bootstrap.min.css',
    '<?php echo base_url(); ?>assets/css/custom.css'];
    CKEDITOR.config.baseHref = '<?php echo base_url(); ?>';
    
    CKEDITOR.replace( 'detail_th' ,{
		filebrowserBrowseUrl : '<?php echo base_url(); ?>media/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=rama', 
		filebrowserUploadUrl : '<?php echo base_url(); ?>media/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=rama', 
		filebrowserImageBrowseUrl : '<?php echo base_url(); ?>media/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=rama'
	});
	CKEDITOR.replace( 'detail_en' ,{
		filebrowserBrowseUrl : '<?php echo base_url(); ?>media/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=rama', 
		filebrowserUploadUrl : '<?php echo base_url(); ?>media/filemanager/dialog.php?type=2&editor=ckeditor&fldr=&akey=rama', 
		filebrowserImageBrowseUrl : '<?php echo base_url(); ?>media/filemanager/dialog.php?type=1&editor=ckeditor&fldr=&akey=rama'
	});
});
</script>