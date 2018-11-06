<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php echo $title; ?>
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo home; ?>/views/backend/style.php">
    <link rel="stylesheet" href="<?php echo home; ?>/views/backend/themes/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo home; ?>/views/backend/bootstrap/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo home; ?>/views/backend/themes/dist/css/skins/_all-skins.min.css">
    <!-- jquery -->
    <script src="<?php echo home; ?>/views/backend/themes/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <script src="<?php echo home; ?>/views/backend/themes/tiny/tinymce.min.js"></script>
    <?php echo $style; ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo home; ?>/admin" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>I</b>CY</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>Cpanel</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="<?php echo home; ?>/admin.php?page=sendmail">
                                <i class="fa fa-envelope-o"></i> Gửi Mail
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo home.''.$myinfo->Avatar; ?>" class="user-image" alt="<?php
                                        if($Name == "") {
                                          echo "Chưa Đặt Tên";
                                        }
                                        else {
                                          echo $Name;
                                        }
                                        ?>">
                                <span class="hidden-xs">
                                    <?php
                                        if($Name == "") {
                                          echo "Chưa Đặt Tên";
                                        }
                                        else {
                                          echo $Name;
                                        }
                                        ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo home.'/'.$myinfo->Avatar; ?>" class="img-circle" alt="<?php
                                        if($Name == "") {
                                          echo "Chưa Đặt Tên";
                                        }
                                        else {
                                          echo $Name;
                                        }
                                        ?>">
                                    <p>
                                        <?php
                                        if($Name == "") {
                                          echo "Chưa Đặt Tên";
                                        }
                                        else {
                                          echo $Name;
                                        }
                                        ?>
                                            <small>
                                            <?php echo $User; ?>
                                        </small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo home; ?>/admin.php?page=profile" class="btn btn-default btn-flat">Cá Nhân</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo home; ?>/admin.php?page=logout" class="btn btn-default btn-flat">Đăng xuất</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
