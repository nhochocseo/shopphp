<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-12">
            <div class="col-md-10">
                <h3>Danh sách bài viết</h3></div>
            <div class="col-md-2">
                <a href="<?php echo home; ?>/admin.php?page=product&action=newproduct" class="btn btn-block btn-success"><i class="fa fa-fw fa-user-plus"></i> Thêm Bài Mới</a>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tên sản phảm</th>
                                    <th>Giá tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Lượt mua</th>
                                    <th>Người đăng</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                  foreach ($getListProduct as $product) {
                    echo "<tr>";
                    echo '<td>'.$product->Product_Name.'</td>';
                    echo '<td>'.$product->Price.'</td>';
                    echo '<td>';
                      if ($product->Status == 0) {
                        echo '<span class="btn-danger btn-sm">Đã xóa</span></td>';
                      } else {
                        echo '<span class="btn-success btn-sm">Xuất hiện</span></td>';
                      }
                    echo '</td>';
                    echo '<td>'.$product->Quantities.'</td>';
                    echo '<td>'.$product->User_Id.'</td>';
                    echo '<td><a href="'.home.'/?pages=product&id='.$product->Id.'" class=" btn-success btn-sm"><i class="fa fa-fw fa-eye"></i></a> <a href="admin.php?page=product&edit='.$product->Id.'&cat='.$product->Category_Id.'" class="btn-info btn-sm"><i class="fa fa-fw fa-edit"></i></a> ';
                      if ($product->Status == 0) {
                        echo '<a href="admin.php?page=product&id='.$product->Id.'&undel=1" class="btn-warning btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                      } else {
                        echo '<a href="admin.php?page=product&id='.$product->Id.'&del=0" class="btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                      }
                      echo '</td>';
                    echo "</tr>";
                  }
                 ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
