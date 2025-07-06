<section class="content-header">
    <h1>News</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">&nbsp;</h3>
                    <div class="box-tools">
                        <a class="btn btn-success btn-sm" href="posts/admin/posts/form"><i class="fa fa-plus"></i> Add Item</a>
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
                            <?php foreach ($posts as $key => $post):?>
                            <tr id="post-<?php echo $post->id; ?>">
                                <td><?php echo number_key($key); ?>
                                </td>
                                <td><?php echo $post->title; ?>
                                </td>
                                <td>
                                    <?php echo date('d/m/Y H:i:s', strtotime($post->created)); ?>
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-primary btn-sm" href="posts/admin/posts/form/<?php echo $post->id; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm delete-link" href="posts/admin/posts/delete/<?php echo $post->id; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-footer">
                    <?php echo $posts->pagination(); ?>
                </div>
            </div>
        </div>
    </div>
</section>