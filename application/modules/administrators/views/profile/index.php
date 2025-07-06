<section class="content-header">
    <h1>Edit profile</h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">  
            <div class="box box-primary">
                <form role="form" id="form" enctype="multipart/form-data" method="POST" action="administrators/profile/save">
                    <div class="box-body">
                        <div class="form-group">
                            <img src="<?php echo admin()->avatar(); ?>" class="img-circle" alt="User Image" style="width:80px; display:block; margin:0 auto 10px;">
                            <label for="exampleInputFile">Avatar</label>
                            <input type="file" name="avatar">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display Name</label>
                            <input type="display" name="display" value="<?php echo $admin->display; ?>" placeholder="Display Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" name="_password" placeholder="Confirm Password" class="form-control">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-primary" type="submit">Update</button>
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
                extension: "png|jpg"
            },
            display: {
                minlength: 3,
                required: true
            },
            _password: {
                equalTo: "#password"
            }
        },
        messages: {
            avatar: {
                accept:"accept image only"
            }
        }
    });
});
</script>