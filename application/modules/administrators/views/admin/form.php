<section class="content-header">
    <h1>Administrator</h1>
    <ol class="breadcrumb">
        <li><a href="administrators"><i class="fa fa-user-secret"></i> Administrator</a></li>
        <li class="active"><?php echo ($admin->id)?'Edit':'Add'; ?></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">  
            <div class="box box-primary">
                <form role="form" id="form" enctype="multipart/form-data" method="POST" action="administrators/save/<?php echo $admin->id; ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <img src="<?php echo $admin->avatar(); ?>" class="img-circle" alt="User Image" style="width:80px; display:block; margin:0 auto 10px;">
                            <label>Avatar</label>
                            <input type="file" name="avatar">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?php echo $admin->username; ?>" class="form-control" <?php echo ($admin->id)?'readonly="readonly"':''; ?>>
                        </div>
                        <div class="form-group">
                            <label>Display Name</label>
                            <input type="text" name="display" value="<?php echo $admin->display; ?>" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="_password" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit"><?php echo ($admin->id)?'Update':'Save'; ?></button>
                        <a class="btn btn-default" href="javascript:history.back();">back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="media/js/jquery.validate.js"></script>
<script src="media/js/additional-methods.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#form').validate({
        rules: {
            avatar: {
                extension: "png|jpg|jpeg"
            },
            <?php if(!$admin->id): ?>
            username: {
                required: true,
                remote: 'administrators/check/username'
            },
            <?php endif; ?>
            display: {
                minlength: 3,
                required: true
            },
            <?php if(!$admin->id): ?>
            password: {
                required: true
            },
            <?php endif; ?>
            _password: {
                equalTo: "#password"
            }
        },
        messages: {
            avatar: {
                accept:"accept image only"
            }
            <?php if(!$admin->id): ?>
            ,
            username: {
                remote: 'email is already existed'
            }
            <?php endif; ?>
        }
    });
});
</script>