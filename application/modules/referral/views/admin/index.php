<section class="content-header">
    <h1>Referral Form</h1>
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
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Time To Call</th>
                                <th>Live in Thailand</th>
                                <!-- <th style="width: 160px;"></th> -->
                            </tr>
                        </thead>
                        <tbody id="sortable">
                            <?php foreach ($referral as $ref):?>
                            <tr>
                                <td>
                                    <?php echo $ref->id ;?>
                                </td>
                                <td>
                                    <?php echo $ref->name; ?>
                                </td>
                                <td>
                                    <?php echo $ref->surname; ?>
                                </td>
                                <td>
                                    <?php echo $ref->email; ?>
                                </td>
                                <td>
                                    <?php echo $ref->mobile; ?>
                                </td>
                                <td>
                                    <?php echo $ref->timetocall; ?>
                                </td>
                                <td>
                                    <?php echo $ref->liveinthailand; ?>
                                </td>
                                <!-- <td class="text-right">
                                <a class="btn btn-primary btn-sm" href="referral/admin/referral/view/<?php echo $ref->id; ?>">View</a>
                                    <a class="btn btn-primary btn-sm" href="referral/admin/referral/form/<?php echo $blog->id; ?>">Edit</a>
                                    <a class="btn btn-danger btn-sm delete-link" href="referral/admin/referral/delete/<?php echo $blog->id; ?>">Delete</a>
                                </td> -->
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