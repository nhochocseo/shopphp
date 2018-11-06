<script type="text/javascript">
function BrowseServer(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = SetFileField;
    finder.popup();
}

function SetFileField(fileUrl) {
    document.getElementById("hdd").src = fileUrl;
    document.getElementById("anhHDD").innerHTML = '<input type="text" name="ImagesPost" class="hdd" value="' + fileUrl + '" />';
}

</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $title; ?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <form action="" method="POST">
                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <div class="box box-primary">
                            <div class="tab-content">
                                <span style="color:red"><?php echo $Message; ?></span>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label>Tên Bài viết</label>
                                        <input type="text" name="Name_Post" class="form-control" placeholder="Tên bài viết" value="<?php echo $getPostId->Name_Post; ?>" required="">
                                    </div>
                                    <div class="form-group">
                                        <label> Nội dung</label>
                                        <textarea id="editor1" name="content" rows="10" cols="80"><?php echo $getPostId->Content_Post; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body">
                            <li class="list-group-item">
                                <div class="form-group">
                                    <label>Danh mục cha</label>
                                    <select name="Categorys" class="form-control">
                                        <?php 
                                            $categories=$this->Category->ListCompany();

                                                 // HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
                                                function showCategories($categories, $parent_id = 0, $char = '')
                                                {
                                                    foreach ($categories as $item)
                                                    {
                                                        $Par = $_GET["cat"];
                                                        // Nếu là chuyên mục con thì hiển thị
                                                        if ($item->Parent_Id == $parent_id)
                                                        {
                                                            echo '<option value="'.$item->Id.'"';
                                                            if ($item->Id == $Par) {
                                                                echo 'selected="selected"';
                                                            }
                                                            echo '>';
                                                            
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
                                        <option value="0">None</option>
                                        <?php showCategories($categories); ?>
                                    </select>
                                </div>
                                <label>Ảnh Mô tả Ngoài</label>
                                <div class="view third-effect">
                                    <img id="hdd" src="<?php echo $getPostId->Image_Link; ?>" alt="Images Product">
                                    <div class="mask">
                                        <a onclick="BrowseServer('avatars');" class="info" data-toggle="tooltip" title="ChangeImage" name="avatar">Changer Images</a>
                                    </div>
                                    <div id="anhHDD"></div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-success btn-lg" name="btn-Product" value="Cập nhật">
                                </div>
                                <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                        </li>
                    </div>
            </form>
            </div>
            <!-- /.row -->
    </section>
    <!-- /.content-wrapper -->
