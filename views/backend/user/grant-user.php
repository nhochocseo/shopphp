<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Phân quyền ban quản trị
        <small><?php echo $user; ?></small>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?php echo $user; ?></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col (left) -->
            <div class="col-md-12">
                <!-- iCheck -->
                <div class="box box-success">
                    <div class="box-body">
                       <form action="admin.php?page=user&grant=<?php echo $user; ?>" method="POST">
                          <div class="group-input">
                              <div class="box-header"><b class="text-aqua"><i class="fa fa-fw fa-hand-o-right"></i> Về sản phẩm</b></div>
                              <input type="radio" name="grant" id="1" value="1" <?php if($Level==1){echo"checked"; } ?>>
                              <label for="1">Quản lý sản phẩm (Thêm/sửa/ xóa sản phẩm, nhà sản xuất)</label>
                          </div>
                          <div class="box-header"><b class="text-green"><i class="fa fa-fw fa-hand-o-right"></i> Về sản đơn hàng</b></div>
                          <div class="group-input">
                              <input type="radio" name="grant" id="2" value="2" <?php if($Level==2){echo"checked"; } ?>>
                              <label for="2">Duyệt hóa đơn, hủy hóa đơn</label>
                          </div>
                          <div class="group-input">
                              <input type="radio" name="grant" id="3" value="3" <?php if($Level==3){echo"checked"; } ?>>
                              <label for="3">Xác nhận hoàn thành hóa đơn</label>
                          </div>
                          <button type="submit" class="btn bg-olive margin" name="btn-grant">Cập Nhật</button>
                      </div>
                    </form>
                    <!-- /.box -->
                </div>
                <!-- /.col (right) -->
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
