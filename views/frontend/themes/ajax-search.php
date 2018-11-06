<?php 
	// Kiểm tra có dòng record nào hay không?
	$paging = 0;
    $tong = 0;
    echo '<div class="item active">
    <div class="row">';
    foreach ($getKeyWord as $key) {
    $gia = ((100-$key->DissCount)/100) * $key->Price;
    if ($key->Status==1) {
    $paging = $paging+1;
    $tong ++;
    echo '<div class="col-md-3 col-xs-6 col-sp-12">
            <div class="thumbnail">
                <div class="item_inner">
                    <img src="'.home.$key->Image_Link.'" alt="...">
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
	    if($paging/4==1){
	          echo '</div></div><div class="item"><div class="row">';
	    }
    }
	    if ($tong=="") {
            echo '<div class="col-md-12 col-xs-6 col-sp-12 text-center"><strong>Không tìm thấy sản phẩm nào !</strong></div>';
        }
		
 ?>
