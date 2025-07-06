<section class="content-header">
    <h1>Administrator</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    <div class="box-tools">
                        <a class="btn btn-success btn-sm" href="administrators/form"><i class="fa fa-plus"></i> Add Administrator</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
        					<tr>
        						<th>#</th>
        						<th>Username</th>
        						<th>Display</th>
        						<th style="width: 120px;"></th>
        					</tr>
        				</thead>
        				<tbody>
        					<?php foreach($admins as $key => $admin):?>
        					<tr <?php echo cycle()?>>
        						<td><?php echo number_key($key); ?></td>
        						<td><?php echo $admin->username; ?></td>
        						<td><?php echo $admin->display; ?></td>
        						<td>
        							<a class="btn btn-primary btn-sm" href="administrators/form/<?php echo $admin->id; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm delete-link" href="administrators/delete/<?php echo $admin->id; ?>">Delete</a>
        						</td>
        					</tr>
        				<?php endforeach; ?>
        			    </tbody>
                    </table>
                </div>
                <div class="box-footer text-center">
                    <?php echo $admins->pagination(' pagination-sm no-margin'); ?>
                </div>
            </div>
        </div>
    </div>
</section>