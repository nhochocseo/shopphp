<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="col-md-12">
            <div class="col-md-10">
                <h3>Danh sách các sản phẩm</h3></div>
            <div class="col-md-2">
                <a href="<?php echo home; ?>/admin.php?page=news&action=newpost" class="btn btn-block btn-success"><i class="fa fa-fw fa-user-plus"></i> Thêm Bài Mới</a>
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
                                    <th>Name Post</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                  foreach ($getListNews as $news) {
                    
                    echo "<tr>";
                    echo '<td>';
                    echo '<ul class="media-list">
                        <li class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-thumb" src="'.$news->Image_Link.'" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading">'.$news->Name_Post.'</h4>
                          </div>
                        </li>
                      </ul>';
                    echo '</td>';
                    
                    echo '<td class="icy-code"><a href="admin.php?page=news&view='.$news->Id.'" class=" btn-success btn-sm"><i class="fa fa-fw fa-eye"></i></a> <a href="admin.php?page=news&edit='.$news->Id.'&cat='.$news->Category_Id.'" class="btn-info btn-sm"><i class="fa fa-fw fa-edit"></i></a> ';
                      if ($news->Status == 0) {
                        echo '<a href="admin.php?page=news&id='.$news->Id.'&undel=1" class="btn-warning btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                      } else {
                        echo '<a href="admin.php?page=news&id='.$news->Id.'&del=0" class="btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                      }
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
