<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $title; ?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#settings" data-toggle="tab">Xửa nội dung</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal" action="" method="POST">
                             <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"><i class="fa <?php echo $getId->Value; ?> fa-4x" aria-hidden="true"></i></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Value" class="form-control" id="Value" placeholder="<?php echo $getId->Value; ?>" value="<?php echo $getId->Value; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label"><?php echo $getId->Name; ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Name" class="form-control" id="inputName" placeholder="<?php echo $getId->Name; ?>" value="<?php echo $getId->Name; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label"><?php echo $getId->Content; ?> </label>
                                    <div class="col-sm-10">
                                        <input type="text" name="Content" class="form-control" id="Content" placeholder="<?php echo $getId->Content; ?>" value="<?php echo $getId->Content; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-danger" name="btnEdit" value="Xửa ngay">
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