<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $title; ?>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Add</a></li>
            <li class="active"> User</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Add User</a></li>
                        <li><span><?php echo $Message; ?></span></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal" action="" method="POST">
                             <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tên Đăng nhập</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="user" class="form-control" id="inputName" placeholder="Tên đăng nhập" value="<?php echo $user; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tên Nick</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputName" placeholder="Nhập Tên" value="<?php echo $name; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email </label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $email; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="PassWord" class="col-sm-2 control-label">Mật khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" id="password" class="form-control" id="inputPassWord" placeholder="Mật Khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="RepeatPassWord" class="col-sm-2 control-label">Nhập lại mất khẩu</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="repeatpassword" class="form-control" id="confirm_password" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox"
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-danger" name="AddUser" value="Thêm User">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
<!-- /.content-wrapper -->
<script>
    var password = document.getElementById("password")
      , confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Mật Khẩu Không Khớp !");
      } else {
        confirm_password.setCustomValidity('');
      }
      if (password.value.length < 9) {
        password.setCustomValidity("Mật khẩu phải lớn hơn 9 kí tự");
      } else {
        password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
