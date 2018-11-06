<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("/../sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="title">
                    <h4><?php echo $NameCategoryParent.$getCategoryId->Category_Name; ?>
                            </h4>
                </div>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php
                                if ($getCategoryId->Category_News == 1) {
                                    echo '<div class="item1">
                                    <div class="row">';
                                    foreach ($getProductbyCategory as $key) {
                                    $gia = ((100-$key->DissCount)/100) * $key->Price;
                                    if ($key->Status==1) {
                                    echo '<div class="col-md-3 col-xs-6 col-sp-12">
                                                <div class="thumbnail">
                                                    <div class="item_inner">
                                                        <img src="'.home.'/'.$key->Image_Link.'" alt="...">
                                                        <div class="buttons">
                                                            <a class="button_buy" href="javascript:;" 
id-product="'.$key->Id.'" price="'.$gia.'" onclick="return AddCart(this);" data-toggle="tooltip" title="Add to Cart"><i style="display: inline-block;" class="fa fa-shopping-cart"></i></a>
                                                            <a class="button_detail" href="'.home.'?pages=product&id='.$key->Id.'" data-toggle="tooltip" title="View Detail"><i style="display: inline-block;" class="fa fa-eye"></i></a>
                                                            <a class="button_wishlist" href="" data-toggle="tooltip" title="Add to Wishlist"><i style="display: inline-block;" class="fa fa-heart"></i></a>
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
                                }
                                ?>
                                </div>
                                </div>
                                 <div class="topmenu">
                                <ul class="pagination">
                                <?php for ($i=1; $i <=$tongsotrang ; $i++) { if($tongsodong > 6) { ?>
                                 <li <?php if ($i == $page) {
                                     echo ' class="active"';
                                 } ?>><a href="?pages=category&id=<?php echo $getCategoryId->Id; ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                 <?php
                                }
                            }
                                 ?>
                                 </ul>
                                </div>
                            <?php }
                            else {
                                $paging = 0;
                                    $tong = 0;
                                    echo '<div class="item active">';
                                    foreach ($getPostCategoryId as $key) {
                                    if ($key->Status==1) {
                                    $tong ++;
                                    echo '<div class="media">
                                          <div class="media-image">
                                             <a href="'.home.'?pages=news&id='.$key->Id.'">
                                              <img class="media-object" src="'.home.'/'.$key->Image_Link.'" alt="...">
                                            </a>
                                          </div>
                                          <div class="media-body">
                                            <h4 class="media-heading"> <a href="'.home.'?pages=news&id='.$key->Id.'">'.$key->Name_Post.'</a></h4>';
                                            // strip tags to avoid breaking any html
                                    $string = strip_tags($key->Content_Post);
                                    if (strlen($string) > 600) {
                                        // truncate string
                                        $stringCut = substr($string, 0, 600);
                                        // make sure it ends in a word so assassinate doesn't become ass...
                                        $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="'.home.'?pages=news&id='.$key->Id.'">Read More</a>'; 
                                    }
                                    }
                                    echo $string;
                                    echo '</div>
                                        </div>';
                                }
                                if ($tong=="") {
                                    echo '<div class="col-md-12 col-xs-6 col-sp-12 text-center"><strong>Không có sản phẩm nào !</strong></div>';
                                }
                                ?>
                                <div class="topmenu">
                                <ul class="pagination">
                                <?php for ($i=1; $i <=$tongsotrang ; $i++) { if($tongsodong > 6) { ?>
                                 <li <?php if ($i == $page) {
                                     echo ' class="active"';
                                 } ?>><a href="?pages=category&id=<?php echo $getCategoryId->Id; ?>&page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                 <?php
                                }
                            }
                            }
                                 ?>
                                 </ul>
                                </div>
                    </div>
                </div>
                <!-- Controls -->
            </div>
        </div>
    </div>
    </div>
</section>
