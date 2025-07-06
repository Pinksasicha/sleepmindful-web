<section class="content-header">
    <h1>Banner</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    <div class="box-tools">
                        <a class="btn btn-success btn-sm" href="banner/admin/banner/form"><i class="fa fa-plus"></i> Add Item</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th></th>
                                <th style="width: 160px;"></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            <?php foreach ($img as $image):?>
                            <tr>
                                <td><?php echo $image->id;?></td>
                                <td><img class="img-responsive" width="200" src="<?php echo "uploads/banner/".$image->image;?>" /></td>
                                <td class="text-right">
                                    <a class="btn btn-danger btn-sm delete-link" href="banner/admin/banner/delete/<?php echo $image->id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                   
                </div>
            </div>
        </div>
    </div>
</section>