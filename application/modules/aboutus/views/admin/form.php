<section class="content-header">
	<h1><i class="fa fa-file-text-o"></i> About us</h1>
</section>
<?php foreach ($aboutus as $aboutus):?>
<form role="form" id="form" enctype="multipart/form-data" method="POST" action="aboutus/admin/aboutus/update/<?php echo $aboutus->id; ?>">
	<section class="content">
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-body pad">
						<div class="form-group">
							<!-- <img class="img-responsive" src="" style="height: 200px;"> -->
							<label>Image (430x430)</label>
							<input type="file" id="imgInp" name="userfile">
						</div>
						<div class="form-group">
                        <img id="blah" src="#" width="300"/>
                        </div>
						<div class="form-group">
							<label>Content</label>
							<input type="text" name="content" placeholder="Content" class="form-control" value="<?php echo $aboutus->content;?>">
							<?php endforeach;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<div class="footer-action">
		<button class="btn btn-primary pull-right" type="submit" value="<?php echo $aboutus->id; ?>">Save</button>
		<a class="btn btn-default" href="javascript:history.back();">back</a>
	</div>
	</form>
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
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
