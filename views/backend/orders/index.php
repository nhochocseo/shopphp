 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách các Hóa đơn
      </h1>
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
                  <th>Số hóa đơn</th>
                  <th>Tên khách hàng</th>
                  <th>Ngày đặt hàng</th>
                  <th>Trạng thái</th>
                  <th>Duyệt bởi</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  foreach ($getListOrders as $Orders) {
                    echo "<tr>";
                    echo '<td>## '.$Orders->Id.'</td>';
                    echo '<td>'.$Orders->Name.'</td>';
                    echo '<td>'.$Orders->Created.'</td>';
                    echo '<td>';
                    if ($Orders->Status==1) {
                     echo '<button type="button" class="btn btn-block btn-success btn-sm">Chờ duyệt</button>';
                    }
                    elseif ($Orders->Status==3) {
                     echo '<button type="button" class="btn btn-block btn-danger btn-sm">Hủy hóa đơn</button>';
                    }
                    elseif ($Orders->Status==2) {
                     echo '<button type="button" class="btn btn-block btn-default btn-sm">Đã hoàn thành</button>';
                    }
                    echo '</td>';
                    echo '<td>'.$Orders->Approval_By.'</td>';
                    echo '<td><a href="admin.php?page=sendmail&to='.$Orders->Email.'" class=" btn-success btn-sm"><i class="fa fa-fw fa-envelope-o"></i> Gửi Mail</a> <a href="admin.php?page=bill&views='.$Orders->Id.'" class="btn-info btn-sm"><i class="fa fa-fw fa-edit"></i> Xem chi tiết</a> ';
                      echo '</td>';
                    echo "</tr>";
                  }
                 ?>
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
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
