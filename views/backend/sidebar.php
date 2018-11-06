 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo home.'/'. $myinfo->Avatar; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><a href="<?php echo home; ?>/admin.php?page=profile"><?php echo $myinfo->Name; ?></a></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo home; ?>/admin"><i class="fa fa-fw fa-home"></i> Trang Chính</a></li>
            <?php
              if ($Admin) {
                echo '<li><a href="'.home.'/admin.php?page=user"><i class="fa fa-users text-aqua"></i> Quản lý User</a></li>';
                echo '<li><a href="'.home.'/admin.php?page=map"><i class="fa fa-fw fa-map-marker  text-aqua"></i> Quản lý Map</a></li>';
                echo '<li><a href="'.home.'/admin.php?page=option"><i class="fa fa-wrench" aria-hidden="true"></i> Cài đặt chung</a></li>';
              }
             ?>
          </ul>
        </li>
         <?php if ($Admin) {
                echo '<li><a href="'.home.'/admin.php?page=category"><i class="fa fa-fw fa-plus-circle"></i> Nhà sản xuất (Category)</a></li>';
                 echo '<li><a href="'.home.'/admin.php?page=slide"><i class="fa fa-fw fa-picture-o"></i> Cài đặt Slide </a></li>';
              }
        ?>
        <?php if ($Admin || $Lv2 || $Lv3 ) {
                echo '<li><a href="'.home.'/admin.php?page=bill"><i class="fa fa-fw fa-cart-plus"></i> <span>Quản lý hóa đơn</span></a></li>';
              }
        ?>
        <?php if ($Admin || $Lv1) {
                echo '<li class="header"><i class="fa fa-laptop"></i> QUẢN LÝ SẢN PHẨM</li>
        <li><a href="'.home.'/admin.php?page=product"><i class="fa fa-circle-o text-aqua"></i> <span>Tất cả sản phẩm</span></a></li>
        <li><a href="'.home.'/admin.php?page=product&action=newproduct"><i class="fa fa-circle-o text-red"></i> <span>Thên sản phảm mới</span></a></li>
        <li><a href="'.home.'/admin.php?page=product&action=configproduct"><i class="fa fa-circle-o text-yellow"></i> <span>Quản lý cấu hình</span></a></li>';
      }
        ?>
        <?php if ($Admin || $Lv1) {
                echo '<li class="header"><i class="fa fa-laptop"></i> QUẢN LÝ TIN TỨC</li>
        <li><a href="'.home.'/admin.php?page=news"><i class="fa fa-circle-o text-aqua"></i> <span>Tất cả tin tức</span></a></li>
        <li><a href="'.home.'/admin.php?page=news&action=newpost"><i class="fa fa-circle-o text-red"></i> <span>Thên Tin tức mới</span></a></li> ';
      }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>