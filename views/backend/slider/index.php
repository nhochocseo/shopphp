<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       Manage Banner
        <small>Quản lý quảng cáo</small>
      </h1>
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
                            <div class="col-md-12">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <a href="admin.php?page=slide&action=addnew" class="btn btn-block btn-success"><i class="fa fa-fw fa-user-plus"></i> Thêm Slide</a>
                                </div>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Slider_Image</th>
                                        <th>Slider_Name</th>
                                        <th>Slider_Link</th>
                                        <th>Custom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    foreach ($ListSlider as $key) {
                                       echo "<tr>";
                                         echo "<td>";
                                            echo '<div id="slideadmin">
                                                <div class="hovereffect"><img id="hdd" class="img-responsive" src="'.home.'/'.$key->Slider_Image.'" alt="">
                                                </div>
                                            </div>';
                                         echo "</td>";
                                         echo "<td>";
                                         echo $key->Slider_Name;
                                         echo "</td>";
                                         echo "<td>";
                                         echo $key->Slider_Link;
                                         echo "</td>";
                                         echo '<td> <a href="'.home.'/admin.php?page=slide&edit='.$key->Id.'" class="btn-info btn-sm"><i class="fa fa-fw fa-edit"></i></a> ';
                                              if ($key->Status == 0) {
                                                echo '<a href="admin.php?page=slide&id='.$key->Id.'&undel=1" class="btn-warning btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
                                              } else {
                                                echo '<a href="'.home.'/admin.php?page=slide&id='.$key->Id.'&del=0" class="btn-danger btn-sm"><i class="fa fa-fw fa-trash-o"></i></a></td>';
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
        </div>
    </section>
    <!-- /.row -->
    <!-- /.content -->
    <!-- /.content-wrapper -->
    <script language="javascript">
    $(document).ready(function() {
        $('#menu_wrapper ul div').hide();
        $('#menu_wrapper ul li a').click(function() {
            var tmp = $(this).next('div');

            if ($(tmp).is(':visible')) {
                $(tmp).hide();
            } else {
                $(tmp).show();
            }
            return false;
        });
    });
    </script>
