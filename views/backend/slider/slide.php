<script type="text/javascript">
function BrowseServer(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = SetFileField;
    finder.popup();
}

function SetFileField(fileUrl) {
    document.getElementById("hdd").src = fileUrl;
    document.getElementById("anhSlider").innerHTML = '<input type="text" name="Slide_Image" class="hdd" value="'+fileUrl+'" />';
}
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $title ?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <form action="" method="POST">
                            <div id="slideadmin">
                                <div class="hovereffect"><img id="hdd" class="img-responsive" src="<?php echo home; ?>/Uploads/files/slide.png" alt="">
                                    <div class="overlay"><a class="info" onclick="BrowseServer('avatars');">Change</a></div>
                                </div>
                            </div>
                            <div id="anhSlider"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tiêu để : </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Slide_Name" class="form-control" placeholder="Tiêu đề" value="" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Link" class="col-sm-2 control-label">Đường dẫn </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Slide_Link" class="form-control" placeholder="Đường dẫn" value="" required>
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
