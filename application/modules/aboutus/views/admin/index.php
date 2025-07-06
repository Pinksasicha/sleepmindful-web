<section class="content-header">
    <h1>About us</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Content</th>
                                <th>image</th>
                                <th style="width: 160px;"></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                        <?php foreach ($aboutus as $aboutus):?>
                            <tr>
                                <td>
                                <?php echo $aboutus->id;?>
                                </td>
                                <td>
                                <?php echo $aboutus->content;?>
                                </td>
                                <td>
                                <img class="img-responsive" width="200" src="<?php echo "uploads/aboutus/".$aboutus->image;?>" />
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-primary btn-sm" href="aboutus/admin/aboutus/form/<?php echo $aboutus->id;?>">Edit</a>
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