<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?php echo $title; ?>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage</a></li>
            <li class="active">Cấu Hình</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!-- /.box -->
                <div class="box">
                    <div class="box-header">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <span style="color:red"><?php echo $Message; ?></span>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Tên Cấu Hinh</label>
                                    <input type="text" name="Config_Name" class="form-control" id="NewCategory" placeholder="<?php echo $NameConfig; ?>" value="<?php echo $NameConfig; ?>" required="">
                                </div>
                                <input type="submit" class="btn btn-danger" name="AddConfig" value="Cập Nhập">
                            </form>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
    <!-- /.row -->
    <!-- /.content -->
    <!-- /.content-wrapper -->
