<section class="content-header">
    <h1>
        Gallery <small><?php echo $activity->title_th; ?></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="activities/admin/activities">Activity</a></li>
        <li><a href="activities/admin/media/index/<?php echo $activity->id; ?>"><?php echo $activity->title_th; ?></a></li>
        <li class="active">Gallery</li>
    </ol>
</section>
<form role="form" id="form" enctype="multipart/form-data" method="POST" action="activities/admin/media/save/<?php echo $activity->id; ?>/<?php echo $media->id; ?>">
<section class="content">
    <div class="row">
        <div class="col-md-6">  
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        <label>Type</label>
                        <?php echo form_dropdown('type',$media->type(),$media->type,'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
			            <?php if($media->thumbnail_path()): ?>
        				<img class="img-responsive" src="<?php echo $media->thumbnail_path(); ?>" style="height: 200px;">
			            <?php endif; ?>
			            <label>Thumbnail (250x250)</label>
		            	<input type="file" name="thumbnail">
		            </div>
		            <div class="form-group type-image type-option">
			            <?php if($media->image_path()): ?>
        				<img class="img-responsive" src="<?php echo $media->image_path(); ?>" style="height: 200px;">
			            <?php endif; ?>
			            <label>Image (933x498)</label>
		            	<input type="file" name="image">
		            </div>
                    <div class="form-group type-youtube type-option">
                        <label>Youtube URL</label>
                        <input type="text" name="youtube" value="<?php echo $media->youtube; ?>" class="form-control">
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
<script>
function render_type() {
    var type = $('select[name="type"] option:selected').val();
    $('.type-option').hide();
    $('.type-' + type).show();
}
$(function(){
    render_type();
    $('select[name="type"]').change(function(){
        render_type();
    })
})
</script>
