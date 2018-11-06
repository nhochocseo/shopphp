<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
       Add New Category
        <small>Thêm nhà sản xuất</small>
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage</a></li>
            <li class="active">Category</li>
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
                        <form action="admin.php?page=category&action=addnew" method="POST">
                            <div class="form-group">
                                  <label>Tên chuyên mục</label>
                                  <input type="text" name="Category_Name" class="form-control" id="NewCategory" placeholder="Tên Chuyên mục" value="" required="">
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                    <select name="AddCategorys" class="form-control">
                                    <option value="0">None</option>
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
                                                            echo '<option value="'.$item->Id.'">';
                                                                    echo $char.' '.$item->Category_Name;
                                                            echo '</option>'; 
                                                            // Xóa chuyên mục đã lặp
                                                            unset($categories->$item);    
                                                            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                                                            showCategories($categories, $item->Id, $char.'--');
                                                        }
                                                    }
                                                }
                                         ?>
                                         <?php showCategories($categories); ?>
                                     </select>
                            </div>
                            <div class="form-group">
                                <label>Loại bài đăng</label>
                                    <select name="CategoryNews" class="form-control">
                                        <option value="1">Đăng Sản phẩm</option>
                                        <option value="0">Đăng Tin tức</option>
                                      </select>
                            </div>
                            <input type="submit" class="btn btn-danger" name="UpdateCategory" value="Cập Nhập">
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
