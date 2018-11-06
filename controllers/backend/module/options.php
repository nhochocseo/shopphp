<?php
	$title = "Cài đặt chung";
    $js = '<script type="text/javascript" src="views/backend/bootstrap/plugins/ckeditor/ckeditor.js"></script>
                     <script type="text/javascript" src="views/backend/bootstrap/plugins/ckfinder/ckfinder.js"></script>';
    $Logo = $this->Options->getId(1);
    $Banner = $this->Options->getId(2);
    $Banner1 = $this->Options->getId(3);
    $NavBar = $this->Options->getId(4);
    $NavBar1 = $this->Options->getId(5);
    $NavBar2 = $this->Options->getId(6);
    $TraGop = $this->Options->getId(7);
    if (isset($_POST["btnLogo"])) {
    	$Id = 1;
    	$Value = $_POST["logo"];
    	$editLogo = $this->Options->editOption($Id,$Value);
    	if ($editLogo) {
    		header("Location: admin.php?page=option");
    	}
    }
    if (isset($_POST["btnBanner"])) {
    	$Id = 2;
    	$Value = $_POST["banner"];
    	$editLogo = $this->Options->editOption($Id,$Value);
    	if ($editLogo) {
    		header("Location: admin.php?page=option");
    	}
    }
    if (isset($_POST["btnBanner1"])) {
    	$Id = 3;
    	$Value = $_POST["banner1"];
    	$editLogo = $this->Options->editOption($Id,$Value);
    	if ($editLogo) {
    		header("Location: admin.php?page=option");
    	}
    }
       if (isset($_POST["btnTraGop"])) {
        $Id = 7;
        $Value = $_POST["tragop"];
        $editLogo = $this->Options->editOption($Id,$Value);
        if ($editLogo) {
            header("Location: admin.php?page=option");
        }
    }
	$content = "views/backend/option/index.php";
    if (isset($_GET["edit"])) {
    	$Id = $_GET["edit"];
    	$title = "Xửa nội dung";
    	$getId = $this->Options->getId($Id);
    	if (isset($_POST["btnEdit"])) {
    		$Value = $_POST["Value"];
	    	$Name = $_POST["Name"];
	    	$Content = $_POST["Content"];
	    	$edits = $this->Options->edits($Id,$Value,$Name,$Content);
	    	if (isset($edits)) {
	    		header("Location: admin.php?page=option");
	    	}
    	}
    	
    	$content = "views/backend/option/edit.php";
    }
 ?>