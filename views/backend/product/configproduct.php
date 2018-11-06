<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Danh sách Câu hình
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <a href="admin.php?page=product&action=newconfig" class="btn btn-block btn-success"> Thêm Cấu Hình</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Tên sản phảm</th>
                                    <th>Giá tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                  foreach ($getConfigProduct as $product) {
                                    echo "<tr>";
                                    echo '<td>'.$product->Config_Name.'</td>';
                                    echo '<td><a href="admin.php?page=product&action=configproduct&edit='.$product->Id.'" class="btn-info btn-sm"><i class="fa fa-fw fa-edit"></i></a> ';
                                      if ($product->Status == 0) {
                                        echo '<a href="admin.php?page=product&action=configproduct&id='.$product->Id.'&undel=1" class="btn-warning btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                                      } else {
                                        echo '<a href="admin.php?page=product&action=configproduct&id='.$product->Id.'&del=0" class="btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
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
