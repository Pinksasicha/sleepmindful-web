<section class="content-header">
    <h1>Blog</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    <div class="box-tools">
                        <a class="btn btn-success btn-sm" href="blogs/admin/blogs/form"><i class="fa fa-plus"></i> Add Item</a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>CreatedAt</th>
                                <th style="width: 160px;"></th>
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            <?php foreach ($blogs as $key => $blog):?>
                            <tr id="blog-<?php echo $blog->id; ?>">
                                <td>
                                    <?php echo number_key($key); ?>
                                </td>
                                <td>
                                    <?php echo $blog->title; ?>
                                </td>
                                <td>
                                    <?php echo date('d/m/Y H:i:s', strtotime($blog->created)); ?>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-primary btn-sm" href="blogs/admin/blogs/form/<?php echo $blog->id; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm delete-link" href="blogs/admin/blogs/delete/<?php echo $blog->id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <?php echo $blogs->pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</section>