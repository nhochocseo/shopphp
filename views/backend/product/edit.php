<script type="text/javascript">
function BrowseServer(obj) {
    var finder = new CKFinder();
    finder.basePath = '../bootstrap/plugins/ckeditor/';
    finder.selectActionFunction = SetFileField;
    finder.popup();
}

function SetFileField(fileUrl) {
    document.getElementById("hdd").src = fileUrl;
    document.getElementById("anhHDD").value = fileUrl;
}

function BrowseServer2() {
    // You can use the "CKFinder" class to render CKFinder in a page:
    var finder = new CKFinder();
    finder.basePath = 'ckeditor/'; // The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField2;
    finder.popup();

}
// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField2(fileUrl) {
    var url, str;
    document.getElementById('listimages').innerHTML = document.getElementById('listimages').innerHTML + '<div id="viewlistimage"><div class="hovereffect"><img class="img-responsive" src="' + fileUrl + '" alt=""><div class="overlay"><a class="info" href="#">Delete</a></div></div></div>';
    document.getElementById('list-image').value = document.getElementById('list-image').value + fileUrl + ",";
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
                                        <input type="text" name="Product_Name" class="form-control" placeholder="<?php echo $getProductId->Product_Name; ?>" value="<?php echo $getProductId->Product_Name; ?>">
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 40%">Thông số</th>
                                                    <th>Giá trị</th>
                                                </tr>
                                                <?php 
                                                foreach ($getProductDetailId as $getConfig) {
                                                    echo "<tr>";
                                                     echo "<td>".$getConfig->Config_Name."</td>";
                                                     echo '<td>
                                                                <input type="text" name="Specs-'.$getConfig->Id.'" class="form-control" placeholder="" value="';
                                                                if (isset($getId)) {
                                                                    echo $getConfig->Description;
                                                                }
                                                    echo '">
                                                            </td>';
                                                    echo "</tr>";
                                                }
                                             ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                        <label> Nội dung</label>
                                        <textarea id="editor1" name="content" rows="10" cols="80">
                                            <?php echo $getProductId->Content_Product; ?>
                                        </textarea>
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
                                <div class="form-group">
                                    <label>Giá</label>
                                    <div class="input-group input-group-sm">
                                        <input type="number" name="Price" value="<?php echo $getProductId->Price; ?>" class="form-control">
                                        <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat">VND</button>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Chiết khấu</label>
                                    <select name="DissCount" class="form-control" required="">
                                        <option value="0">Giảm giá</option>
                                        <option <?php if($getProductId->DissCount == 0) { echo 'selected="selected"';} ?> value="0">Không</option>
                                        <option value="5" <?php if($getProductId->DissCount == 5) { echo 'selected="selected"';} ?>>-5%</option>
                                        <option value="10" <?php if($getProductId->DissCount == 10) { echo 'selected="selected"';} ?>>-10%</option>
                                        <option value="15" <?php if($getProductId->DissCount == 15) { echo 'selected="selected"';} ?>>-15%</option>
                                        <option value="20" <?php if($getProductId->DissCount == 20) { echo 'selected="selected"';} ?>>-20%</option>
                                        <option value="25" <?php if($getProductId->DissCount == 25) { echo 'selected="selected"';} ?>>-25%</option>
                                        <option value="30" <?php if($getProductId->DissCount == 30) { echo 'selected="selected"';} ?>>-30%</option>
                                    </select>
                                </div>
                                <label>Ảnh Mô tả Ngoài</label>
                                <div class="view third-effect">
                                    <img id="hdd" src="<?php echo $getProductId->Image_Link; ?>" alt="Images Product">
                                    <div class="mask">
                                        <a onclick="BrowseServer('avatars');" class="info" data-toggle="tooltip" title="ChangeImage" name="avatar">Changer Images</a>
                                    </div>
                                </div>
                                    <input type="text" name="ImagesProduct" id="anhHDD" class="hdd" value="<?php echo $getProductId->Image_Link; ?>" />
                                <div class="form-group">
                                    <label>Ảnh mô tả sản phẩm trong (Chọn lần lượt các ảnh)</label>
                                    <input class="btn btn-info btn-flat" type="button" value="Chọn.." onclick="BrowseServer2();" />
                                    <div id="listimages"></div>
                                    <?php 
                                        foreach ($arrImages as $key) {
                                            if ($key != "") {
                                            echo '<div id="viewlistimage"><div class="hovereffect"><img class="img-responsive" src="'. $key.'" alt=""><div class="overlay"><a class="info" href="#">Delete</a></div></div></div>' ;
                                            }
                                        }
                                     ?>
                                    <input type="text" id="list-image" value="<?php echo $getProductId->Image_List; ?>" name="ListImages" class="form-control" required>
                                    <br/>
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
