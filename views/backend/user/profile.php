<script type="text/javascript">
function BrowseServer(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = SetFileField;
    finder.popup();
}

function SetFileField(fileUrl) {
    document.getElementById("hdd").src = fileUrl;
    document.getElementById("anhHDD").innerHTML = '<form class="form-horizontal" action="" method="POST"><input type="text" name="avatar" class="hdd" value="' + fileUrl + '" /><input type="submit" name="btnAvatar" class="btn btnavatar btn-info" value="Lưu"></form>';
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $title; $myinfo->User_Name; ?>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">
                <?php echo $myinfo->User_Name; ?> profile</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <div class="view third-effect">
                            <img class="profile-user-img img-responsive img-circle" id="hdd" src="<?php echo $myinfo->Avatar; ?>" alt="User profile picture">
                            <div class="mask">
                                <a onclick="BrowseServer('avatars');" class="info" data-toggle="tooltip" title="Đổi Avatar" name="avatar">Changer Avatar</a>
                            </div>
                        </div>
                        <!--  </div> -->
                        <h3 class="profile-username text-center">
                        <div id="anhHDD"></div>
                <?php 
                  echo $myinfo->User_Name;
                 ?>
              </h3>
                        <p class="text-muted text-center">
                            <?php
                    if($myinfo->Name == "") {
                      echo "Chưa Đặt Tên";
                    }
                    else {
                      echo $myinfo->Name;
                    }
                 ?>
                        </p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Tên : </b> <a class="pull-right"><?php
                    if($myinfo->Name == "") {
                      echo "Chưa Đặt Tên";
                    }
                    else {
                      echo $myinfo->Name;
                    }
                 ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Email : </b> <a class="pull-right"><?php
                    if($myinfo->Email == "") {
                      echo "Chưa thiết lập Email";
                    }
                    else {
                      echo $myinfo->Email;
                    }
                 ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Chức Vụ : </b> <a class="pull-right"><?php
                    if($myinfo->Level == "0") {
                      echo "Cấp Cao";
                    }
                    elseif($myinfo->Level == "1") {
                      echo "Nhân Viên";
                    }
                    else {
                      echo "Ngoại Lai";
                    }
                 ?></a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <?php 
                    
                     ?>
                        <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                        <li><span><?php echo $Message; ?></span></li>
                        <?php $changer = ""; echo $changer; $errname; ?>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal" action="" method="POST">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tên</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputName" placeholder="<?php
                    if($myinfo->Name == " ") {
                      echo "Chưa Đặt Tên ";
                    }
                    else {
                      echo $myinfo->Name;
                    }
                 ?>" value="<?php echo $myinfo->Name; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email </label>
                                    <?php echo $erremail; ?>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo $myinfo->Email; ?>" required>
                                    </div>
                                </div>
                                <!--  <div class="form-group">
                                    <label for="inputAvatar" class="col-sm-2 control-label">Avatar </label>
                                    <div class="col-sm-10">
                                         <input type="text" name="avatar" id="hdd" value="<?php echo $myinfo->Avatar; ?>" />
                                         <input type="button" value="Chọn Ảnh ..." onclick="BrowseServer();"/>

                                    </div>
                                </div> -->
                                <div class="form-group">
                                    <label for="PassWord" class="col-sm-2 control-label">Mật khẩu cũ</label>
                                    <div class="col-sm-10">
                                        <?php echo $errpassword; ?>
                                        <input type="password" name="password" class="form-control" id="oldpassword" placeholder="Mật Khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="PassWord" class="col-sm-2 control-label">Mật khẩu mới</label>
                                    <div class="col-sm-10">
                                        <input data-toggle="tooltip" title="Mật khẩu phải 4-20 kí tự - 1 chữ số và 1 chữ in hoa !" type="password" name="newpassword" class="form-control" id="newpassword" placeholder="Mật Khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="RepeatPassWord" class="col-sm-2 control-label">Nhập lại mất khẩu mới</label>
                                    <div class="col-sm-10">
                                        <?php echo $errnewpassword; ?>
                                        <input type="password" name="repeatnewpassword" id="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <!--  <label>
                                                <input type="checkbox" name="checkpass" value="Yes" /> Bạn muốn đổi mật khẩu ?
                                            </label> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-danger" name="btnUpdate" value="Cập Nhập">
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
    var password = document.getElementById("newpassword")
      , confirm_password = document.getElementById("confirm_password");
    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Mật Khẩu Không Khớp !");
      } else {
        confirm_password.setCustomValidity('');
      }
      var check = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{4,20}$/;
      if (password.value.match(check)) {
        password.setCustomValidity("");
      } else {
        password.setCustomValidity('Mật khẩu phải 4-20 kí tự - 1 chữ số và 1 chữ in hoa');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>