<style type="text/css">    
#sortable {
    padding: 5px;
}
</style>
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
<section class="content">
    <div class="clearfix box-header">
        <a class="btn btn-success btn-sm pull-right" style="margin-left: 5px;" href="activities/admin/media/form/<?php echo $activity->id; ?>"><i class="fa fa-plus"></i> Add Item</a> 
    </div> 
	<div id="sortable" class="row">
	    <?php foreach($medias as $media): ?>
	    <div id="media-<?php echo $media->id; ?>" class="col-sm-4 col-md-3 col-lg-2">
	        <div class="thumbnail">
	            <img src="<?php echo $media->thumbnail_path(); ?>" data-src="holder.js/250x250/auto" class="img-responsive">
	            <div class="caption">
	                <p>
	                    <a href="activities/admin/media/form/<?php echo $activity->id; ?>/<?php echo $media->id; ?>" class="btn btn-success btn-sm" role="button">Edit</a> 
	                    <a href="activities/admin/media/delete/<?php echo $media->id; ?>" class="btn btn-danger btn-sm delete-link" role="button">Delete</a>
	                </p>
	          </div>
	        </div>
	    </div>
	    <?php endforeach; ?>
	</div>
</section>
<script src="themes/admin/asset/plugins/jQueryUI/jquery-ui.min.js"></script>
<script>
$(function() {
    var fixHelper = function(e, ui) {
    	ui.children().each(function() {
    		$(this).width($(this).width());
    	});
    	return ui;
    };
    
    $( "#sortable" ).sortable({
        helper: fixHelper,
        start: function(e, ui){
            ui.placeholder.height(ui.item.height());
        },
        stop: function(e, ui){
            $('.thumbnail').css('width','auto');
        },
    	update: function( event, ui ) {
        	var data = $(this).sortable('serialize');
        	$.ajax({
                data: data,
                type: 'POST',
                url: '<?php echo base_url(); ?>activities/admin/media/sequence'
            });
    	}
    }).disableSelection();
        
});
</script>