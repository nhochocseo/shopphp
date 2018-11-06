<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       Manage Categorys
        <small>Quản lý Danh Mục</small>
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
                                        <a href="admin.php?page=category&action=addnew" class="btn btn-block btn-success"><i class="fa fa-fw fa-user-plus"></i> Thêm Mới</a>
                                    </div>
                                </div>



                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category_Id</th>
                                        <th>Category_Name</th>
                                        <th>Category_News</th>
                                        <th>Custom</th>
                                    </tr>
                                </thead>
                                <tbody>

 <?php
         $categories=$this->Category->ListCompany();
         // HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
        function showCategories($categories, $parent_id = 0, $char = '')
        {
            foreach ($categories as $item)
            {
                // Nếu là chuyên mục con thì hiển thị
                if ($item->Parent_Id == $parent_id)
                {
                    echo '<tr>';
                        echo '<td>';
                            echo $item->Id;
                        echo '</td>';
                        echo '<td>';
                            echo '<a href="admin.php?page=category&edit=' .$item->Id. '&par=' .$item->Parent_Id. '" data-toggle="tooltip" title="Edit user ' . $item->Category_Name.' ">' .$char .'<i class="fa fa-fw fa-circle-o"></i>'. $item->Category_Name. '</a>';
                        echo '</td>';
                        echo '<td>';
                            if ($item->Category_News == 1) {
                                echo "Bài viết";
                            }
                            else {
                                echo "Tin tức";
                            }
                        echo '</td>';
                         echo '<td><a href="admin.php?page=category&edit=' .$item->Id. '&par=' .$item->Parent_Id. '" data-toggle="tooltip" title="Edit user ' . $item->Category_Name.' " class="btn btn-info"><i class="fa fa-fw fa-edit"></i> Xửa</a></td>';
                    echo '</tr>'; 
                    // Xóa chuyên mục đã lặp
                    unset($categories->$item);    
                    // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    showCategories($categories, $item->Id, $char.'&nbsp;&nbsp;&nbsp;&nbsp;');
                }
            }
        }
 ?> 

                <?php showCategories($categories); ?>
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
             $(document).ready(function(){
                $('#menu_wrapper ul div').hide();
                $('#menu_wrapper ul li a').click(function(){
                    var tmp = $(this).next('div');
                     
                    if ($(tmp).is(':visible')){
                        $(tmp).hide();
                    }
                    else{
                        $(tmp).show();
                    }
                    return false;
                }); 
             });
         </script>