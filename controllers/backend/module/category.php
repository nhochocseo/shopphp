<?php
	$title = "Danh sách nhà sản xuất";
	$content = "views/backend/category/index.php";
	$categories=$this->Category->ListCompany();
         // HÀM ĐỆ QUY HIỂN THỊ CATEGORIES
    function ListCategory($categories, $parent_id = 0, $char = '')
        {
            foreach ($categories as $item)
            {
                // Nếu là chuyên mục con thì hiển thị
                if ($item->Parent_Id == $parent_id)
                {
                  return true; 
                    // // Xóa chuyên mục đã lặp
                    // unset($categories->$item);    
                    // // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
                    // showCategories($categories, $item->Id, $char.'&nbsp;&nbsp;&nbsp;&nbsp;');
                }
            }
        }
	if (isset($_GET["action"])) {
		//Hàm thêm danh mục
		$company = $_GET["action"];
		if ($company == "addnew") {
			$title = htmlentities("Thêm danh mục sản phẩm");
			$content = "views/backend/category/addnew.php";
            if(isset($_POST["AddCategorys"])){
                $NameCategory = htmlentities($_POST["Category_Name"]);
                $Parent = $_POST["AddCategorys"];
                $CategoryNews = $_POST["CategoryNews"];
                $AddCategorys = $this->Category->AddCategorys($NameCategory,$Parent,$CategoryNews);
                if ($AddCategorys) {
                    $Message  = "Thêm chuyên mục thành công";
                }
            }
		}
		else {
			$content = "err.php";
		}
	}
    if (isset($_GET["edit"])) {
        $getCategory = $this->Category->getCategoryId($_GET["edit"]);
        $title = "Sửa ".$getCategory->Category_Name;
        $Id = $_GET["edit"];
        $content = "views/backend/category/edit.php";
        if (isset($_POST["UpdateCategory"])) { 
            $NameCategory = $_POST["Category_Name"];
            $Parent = $_POST["EditCategorys"];
            $EditCategoryNews = $_POST["EditCategoryNews"];
            $EditCategory = $this->Category->EditCategory($NameCategory,$Parent,$EditCategoryNews,$Id);
            if ($EditCategory) {
                header("Location: admin.php?page=category");
            }
        }
    }
 ?>