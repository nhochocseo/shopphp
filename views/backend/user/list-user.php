<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       Manage User
        <small>Quản lý thành viên</small>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage</a></li>
            <li class="active">User</li>
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
                                <div class="col-md-12">
                                <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <a href="admin.php?page=add&user" class="btn btn-block btn-success"><i class="fa fa-fw fa-user-plus"></i> Thêm Quản Trị</a>
                                    </div>
                                </div>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>User_Id</th>
                                        <th>User_Name</th>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Custom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  foreach($ListUser as $key)
                    {
                      echo "<tr>";
                            echo "<td>" . $key->User_Id."</td>";
                            echo "<td>" . $key->User_Name."</td>";
                            echo "<td>" . $key->Name."</td>";
                            echo "<td>" . $key->Level."</td>";
                        if ($key->Level == 0) {
                            echo '<td><a data-toggle="tooltip" title="No Edit user ' . $key->User_Name.' " class="btn btn-info"><i class="fa fa-fw fa-edit"></i> Xửa</a> <a data-toggle="tooltip" title="No Band user ' . $key->User_Name.'" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i>No Band</a></td>';
                        }else {
                            if ($key->Level == 4) {   
                                echo '<td><a data-toggle="tooltip" title="No Cấp Quyền ' . $key->User_Name.' " class="btn btn-success"><i class="fa fa-fw fa-gears"></i> Cấp Quyền</a> <a href="admin.php?page=user&edit=' .$key->User_Name. '" data-toggle="tooltip" title="Edit user ' . $key->User_Name.' " class="btn btn-info"><i class="fa fa-fw fa-edit"></i> Xửa</a>  <a href="admin.php?page=user&unband=' .$key->User_Name. '" data-toggle="tooltip" title="Bỏ Band" class="btn btn-warning"><i class="fa fa-fw fa-trash-o"></i>Bỏ Band</a></td>';
                            }
                            elseif ($key->Level == 1 ||$key->Level == 2 || $key->Level == 3 ) {   
                                echo '<td><a href="admin.php?page=user&grant=' .$key->User_Name. '" data-toggle="tooltip" title="Cấp Quyền ' . $key->User_Name.' " class="btn btn-success"><i class="fa fa-fw fa-gears"></i> Cấp Quyền</a> <a href="admin.php?page=user&edit=' .$key->User_Name. '" data-toggle="tooltip" title="Edit user ' . $key->User_Name.' " class="btn btn-info"><i class="fa fa-fw fa-edit"></i> Xửa</a>  <a href="admin.php?page=user&band=' .$key->User_Name. '" data-toggle="tooltip" title="Band" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i>Band</a></td>';
                            }
                         }
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
