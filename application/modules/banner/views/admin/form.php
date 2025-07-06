<section class="content-header">
	<h1><i class="fa fa-file-text-o"></i> Banner</h1>
</section>

<!-- <form action="banner/admin/banner/save/" method="POST" enctype="multipart/form-data"> -->
<?php echo form_open_multipart('banner/admin/banner/save');?>
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body pad">
						
						<div class="form-group">
							
							<label>Banner (1280x720)</label>
							<input type="file" id="imgInp" name="userfile">
						</div>

                        <div class="form-group">
                        <img id="blah" src="#" width="300"/>
                        </div>
						
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="footer-action">
		<button class="btn btn-primary pull-right" type="submit" value="Upload">Save</button>
		<a class="btn btn-default" href="javascript:history.back();">back</a>
	</div>
    <?php form_close(); ?> 
<!-- </form> -->
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

    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>