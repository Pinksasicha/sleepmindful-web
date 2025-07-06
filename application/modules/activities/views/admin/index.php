<section class="content-header">
    <h1>Activity</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    <div class="box-tools">
                        <a class="btn btn-success btn-sm" href="activities/admin/activities/form"><i class="fa fa-plus"></i> Add Item</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
        					<tr>
        						<th>#</th>
        						<th>Title</th>
        						<th style="width: 180px;"></th>
        					</tr>
        				</thead>
        				<tbody id="sortable">
        					<?php foreach($activities as $key => $activity):?>
        					<tr id="activity-<?php echo $activity->id; ?>">
        						<td><?php echo number_key($key); ?></td>
        						<td><?php echo $activity->title_th; ?></td>
        						<td>
                                    <a class="btn btn-default btn-sm" href="activities/admin/media/index/<?php echo $activity->id; ?>">Gallery</a>
        							<a class="btn btn-primary btn-sm" href="activities/admin/activities/form/<?php echo $activity->id; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm delete-link" href="activities/admin/activities/delete/<?php echo $activity->id; ?>">Delete</a>
        						</td>
        					</tr>
        				<?php endforeach; ?>
        			    </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                url: '<?php echo base_url(); ?>activities/admin/activities/sequence'
            });
    	}
    }).disableSelection();
       
});
</script>