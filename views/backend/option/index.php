<script type="text/javascript">
function BrowseLogo(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = Logo;
    finder.popup();
}

function Logo(fileUrl) {
    document.getElementById("logo").src = fileUrl;
    document.getElementById("Logo").innerHTML = '<form class="form-horizontal" action="" method="POST"><input type="text" name="logo" class="hdd" value="' + fileUrl + '" /><input type="submit" name="btnLogo" class="btn btnavatar btn-info" value="Lưu"></form>';
}

function BrowseBanner(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = Banner;
    finder.popup();
}

function Banner(fileUrl) {
    document.getElementById("banner").src = fileUrl;
    document.getElementById("Banner").innerHTML = '<form class="form-horizontal" action="" method="POST"><input type="text" name="banner" class="hdd" value="' + fileUrl + '" /><input type="submit" name="btnBanner" class="btn btnavatar btn-info" value="Lưu"></form>';
}

function BrowseBanner1(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = Banner1;
    finder.popup();
}

function Banner1(fileUrl) {
    document.getElementById("banner1").src = fileUrl;
    document.getElementById("Banner1").innerHTML = '<form class="form-horizontal" action="" method="POST"><input type="text" name="banner1" class="hdd" value="' + fileUrl + '" /><input type="submit" name="btnBanner1" class="btn btnavatar btn-info" value="Lưu"></form>';
}
function BrowseBanner1(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = Tragop;
    finder.popup();
}

function Tragop(fileUrl) {
    document.getElementById("tragop").src = fileUrl;
    document.getElementById("Tragop").innerHTML = '<form class="form-horizontal" action="" method="POST"><input type="text" name="tragop" class="hdd" value="' + fileUrl + '" /><input type="submit" name="btnTraGop" class="btn btnavatar btn-info" value="Lưu"></form>';
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
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary form-group">
                    <label class="icy-option">Logo </label>
                    <div class="box-body box-profile">
                        <div id="slideadmin">
                            <div class="hovereffect"><img id="logo" class="img-responsive" src="<?php echo home.'/'. $Logo->Value; ?>" alt="">
                                <div class="overlay"><a class="info" onclick="BrowseLogo('Logo');">Change</a></div>
                            </div>
                        </div>
                        <!--  </div> -->
                        <div id="optionseve">
                            <div id="Logo"></div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="box box-primary form-group">
                    <label class="icy-option">Banner </label>
                    <div class="box-body box-profile">
                        <div id="slideadmin">
                            <div class="hovereffect"><img id="banner" class="img-responsive" src="<?php echo home.'/'. $Banner->Value; ?>" alt="">
                                <div class="overlay"><a class="info" onclick="BrowseBanner('banner');">Change</a></div>
                            </div>
                        </div>
                        <!--  </div> -->
                        <div id="optionseve">
                            <div id="Banner"></div>
                        </div>
                    </div>
                    <div class="box box-primary form-group">
                        <label class="icy-option">Banner 1 </label>
                        <div class="box-body box-profile">
                            <div id="slideadmin">
                                <div class="hovereffect"><img id="banner1" class="img-responsive" src="<?php echo home.'/'. $Banner1->Value; ?>" alt="">
                                    <div class="overlay"><a class="info" onclick="BrowseBanner1('banner1');">Change</a></div>
                                </div>
                            </div>
                            <!--  </div> -->
                            <div id="optionseve">
                                <div id="Banner1"></div>
                            </div>
                        </div>
                        </div>
                        <div class="box box-primary form-group">
                        <label class="icy-option">Banner Trả Góp </label>
                        <div class="box-body box-profile">
                            <div id="slideadmin">
                                <div class="hovereffect"><img id="tragop" class="img-responsive" src="<?php echo home.'/'. $TraGop->Value; ?>" alt="">
                                    <div class="overlay"><a class="info" onclick="BrowseBanner1('tragop');">Change</a></div>
                                </div>
                            </div>
                            <!--  </div> -->
                            <div id="optionseve">
                                <div id="Tragop"></div>
                            </div>
                        </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                            truy cập <a href="http://fontawesome.io/icon">http://fontawesome.io/icon</a> để lấy mã icon
                        </ul>
                        <div class="tab-content">
                            <div class="active tab-pane" id="settings">
                                <div class="form-group">
                                <div class="pull-right"><a href="<?php echo home; ?>/admin.php?page=option&edit=<?php echo $NavBar->Id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                    <div class="pull-left"> <i class="fa <?php echo $NavBar->Value; ?> fa-4x" aria-hidden="true"></i></div>
                                    <div class="media-body">
                                        <p><strong><?php echo $NavBar->Name; ?></strong></p> <?php echo $NavBar->Content; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="pull-right"><a href="<?php echo home; ?>/admin.php?page=option&edit=<?php echo $NavBar1->Id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                    <div class="pull-left"> <i class="fa <?php echo $NavBar1->Value; ?> fa-4x" aria-hidden="true"></i></div>
                                    <div class="media-body">
                                        <p><strong><?php echo $NavBar1->Name; ?></strong></p> <?php echo $NavBar1->Content; ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                <div class="pull-right"><a href="<?php echo home; ?>/admin.php?page=option&edit=<?php echo $NavBar2->Id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a></div>
                                    <div class="pull-left"> <i class="fa <?php echo $NavBar2->Value; ?> fa-4x" aria-hidden="true"></i></div>
                                    <div class="media-body">
                                        <p><strong><?php echo $NavBar2->Name; ?></strong></p> <?php echo $NavBar2->Content; ?>
                                    </div>
                                </div>
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
    var password = document.getElementById("newpassword"),
        confirm_password = document.getElementById("confirm_password");

    function validatePassword() {
        if (password.value != confirm_password.value) {
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
