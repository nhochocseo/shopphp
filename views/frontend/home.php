<section class="slider-wraper">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <section class="slide">
                    <ul id="slide">
                        <?php 
                            foreach ($ListSlider as $key) {
                                echo '<li><a href="'.$key->Slider_Link.'"><img src="'.home.$key->Slider_Image.'" alt="'.$key->Slider_Name.'"></a></li>';
                            }
                         ?>
                    </ul>
                </section>
            </div>
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <div class="effect-images">
                    <a href=""><img style="padding-bottom: 20px;" src="<?php echo home.'/'. $Banner->Value; ?>" alt=""></a>
                </div>
                <div class="effect-images1">
                    <a href=""><img src="<?php echo home.'/'. $Banner1->Value; ?>" alt=""></a>
                </div>
            </div>
        </div>
</section>
<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="title">
                        <h4>Sản phẩm Mới
                            <div class="pull-right">
                            <a href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                            </h4>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                                    <?php
                                    $paging = 0;
                                    echo '<div class="item active">
                                    <div class="row">';
                                    foreach ($getListProduct as $key) {
                                    $gia = ((100-$key->DissCount)/100) * $key->Price;
                                    if ($key->Status==1) {
                                    $paging = $paging+1;
                                    echo '<div class="col-md-3 col-xs-6 col-sp-12">
                                                <div class="thumbnail">
                                                    <div class="item_inner">
                                                        <img src="'.home.'/'.$key->Image_Link.'" alt="...">
                                                        <div class="buttons">
                                                            <a class="button_buy" href="javascript:;"
id-product="'.$key->Id.'" price="'.$gia.'" onclick="return AddCart(this);" data-toggle="tooltip" title="Add to Cart"><i style="display: inline-block;" class="fa fa-shopping-cart"></i></a>
                                                            <a class="button_detail" href="'.home.'?pages=product&id='.$key->Id.'" data-toggle="tooltip" title="View Detail"><i style="display: inline-block;" class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h3 class="icy-title"> <a href="'.home.'?pages=product&id='.$key->Id.'">'.$key->Product_Name.'</a></h3>
                                                        <span class="icy-box-price">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                            Giá gốc : <del>'.Price_Dots($key->Price).'</del> VNĐ
                                                        </span><p class="icy-box-price">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                            Giá bán : '.Price_Dots($gia).' VNĐ </p></div>
                                                </div>
                                        </div>';
                                    }
                                    if($paging/4==1){
                                        echo '</div></div><div class="item"><div class="row">';
                                    }
                                }
                            ?>
                                </div>
                            </div>
</div></div>
<div class="container tragop"><img src="<?php echo home.'/'. $TraGop->Value; ?>"></div>

                            <div class="title">
                        <h4>Sản phẩm Bán Chạy
                            <div class="pull-right">
                            <a href="#SanPhamBanChay" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#SanPhamBanChay" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                            </h4>
                    </div>
                    <div id="SanPhamBanChay" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                                    <?php
                                    $paging = 0;
                                    echo '<div class="item active">
                                    <div class="row">';
                                    foreach ($SanPhamBanChay as $key) {
                                    $gia = ((100-$key->DissCount)/100) * $key->Price;
                                    if ($key->Status==1) {
                                    $paging = $paging+1;
                                    echo '<div class="col-md-3 col-xs-6 col-sp-12">
                                                <div class="thumbnail">
                                                    <div class="item_inner">
                                                        <img src="'.home.'/'.$key->Image_Link.'" alt="...">
                                                        <div class="buttons">
                                                            <a class="button_buy" href="javascript:;"
id-product="'.$key->Id.'" price="'.$gia.'" onclick="return AddCart(this);" data-toggle="tooltip" title="Add to Cart"><i style="display: inline-block;" class="fa fa-shopping-cart"></i></a>
                                                            <a class="button_detail" href="'.home.'?pages=product&id='.$key->Id.'" data-toggle="tooltip" title="View Detail"><i style="display: inline-block;" class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="caption">
                                                        <h3 class="icy-title"> <a href="'.home.'?pages=product&id='.$key->Id.'">'.$key->Product_Name.'</a></h3>
                                                        <span class="icy-box-price">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                            Giá gốc : <del>'.Price_Dots($key->Price).'</del> VNĐ
                                                        </span><p class="icy-box-price">
                                                            <i class="fa fa-money" aria-hidden="true"></i>
                                                            Giá bán : '.Price_Dots($gia).' VNĐ </p></div>
                                                </div>
                                        </div>';
                                    }
                                    if($paging/4==1){
                                        echo '</div></div><div class="item"><div class="row">';
                                    }
                                }
                            ?>
                                </div>
                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                    </div>
                </div>
            </div>
        </div>
</section>
