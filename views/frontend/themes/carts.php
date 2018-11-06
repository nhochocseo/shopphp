<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("/../sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
            <div class="col-sm-9">
                                <div class="list-group">
                                    <div class="btn-group btn-group-justified">
                                        <a class="btn btn-success btn-sm">01. XEM GIỎ HÀNG</a>
                                        <a class="btn btn-default btn-sm">02.NHẬP THÔNG TIN</a>
                                        <a class="btn btn-default btn-sm">03.XEM LẠI HÓA ĐƠN</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                            </div>
                <div class="row">
                    <table ui-jq="dataTable" class="table table-striped m-b-none">
                                                    <thead>
                                                        <tr>
                                                            <th>Ảnh</th>
                                                            <th>Sản phẩm</th>
                                                            <th>Trạng thái</th>
                                                            <th>Giá (VND)</th>
                                                            <th>Số lượng</th>
                                                            <th>Thành tiền (VNĐ)</th>
                                                            <th>Tùy chọn</th>
                                                        </tr>
                                                        <tbody>
                                                            <?php
                                                    $UnitPrice = 0;
                                                    $Orders = array();
                                                    for($i=0; $i<$NumberCart;$i++ ){
                                                        $price = $this->Product->getProductId($Cart[$i][0])->Price;
                                                        $DissCount = $this->Product->getProductId($Cart[$i][0])->DissCount;
                                                        if($DissCount>0){
                                                            $p_price = $price - ($price*($DissCount/100));                              
                                                        }
                                                        else{
                                                            $p_price = $price;
                                                        }
                                                        $_SESSION["Orders"] = $Orders;
                                                        $UnitPrice = $UnitPrice+($p_price*$Cart[$i][1]);
                                                        $Pr_Id = $Cart[$i][0];
                                                        $Number_Product
 = $Cart[$i][1];
                                                        $Orders[$i] = array($Pr_Id,$Number_Product,$p_price);
                                                ?>
                                                                <tr id="product_19_112_0_0" class="cart_item last_item first_item address_0 odd">
                                                                    <td class="cart_product">
                                                                        <a href="?pages=product&id=<?php echo $Pr_Id; ?>&cat=<?php echo $this->Product->getProductId($Cart[$i][0])->Category_Id; ?>"><img src="<?php  $thumb = $this->Product->getProductId($Cart[$i][0])->Image_Link; echo $thumb; ?>" alt="<?php  $title = $this->Product->getProductId($Cart[$i][0])->Product_Name; echo $title; ?>" width="60" height="70"  /></a>
                                                                    </td>
                                                                    <td>
                                                                        <p>
                                                                            <a href="?pages=product&id=<?php echo $Pr_Id; ?>&cat=<?php echo $this->Product->getProductId($Cart[$i][0])->Category_Id; ?>">
                                                                                <?php  $title = $this->Product->getProductId($Cart[$i][0])->Product_Name; echo $title; ?>
                                                                            </a>
                                                                        </p>
                                                                        <span>
                                                                    <?php
                                                                        if ($DissCount>0) {
                                                                            echo 'Giá Gốc: <span class="text-danger text-l-t">' . Price_Dots($price) .'</span> VNĐ ( - '. $DissCount .' % ) '; } ?>
                                                                        </span>
                                                                    </td>
                                                                    <td><span class="label label-success">Còn hàng</span></td>
                                                                    <td>
                                                                        <span class="price">
                                        <span class="text-success"><?php echo  number_format($p_price); ?></span>
                                                                        </span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <input type="hidden" value="1" />
                                                                        <input size="2" type="text" autocomplete="off" class="cart_quantity_input form-control grey" value="<?php echo $Number_Product; ?>" id="Number_Pr<?php echo $Pr_Id; ?>" />
                                                                        <div class="cart_quantity_button clearfix">
                                                                            <a rel="nofollow" class="btn-xs btn btn-default" href="javascript:;" Delete="<?php echo $Pr_Id; ?>" price="<?php echo $p_price; ?>" onclick="return Delete_One(this);">
                                                                                <span><i class="fa fa-minus-square" aria-hidden="true"></i></span>
                                                                            </a>
                                                                            <a rel="nofollow" class="btn-xs btn btn-default" href="javascript:;" id-product="<?php echo $Pr_Id; ?>" price="<?php echo $p_price; ?>" onclick="return Add_Number_Product(this);"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span></a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="cart_total">
                                                                        <span id="IntoMoney_<?php echo $Pr_Id; ?>"> <?php echo  number_format($p_price*$Number_Product); ?></span>
                                                                    </td>
                                                                    <td class="cart_delete text-center" data-title="Delete">
                                                                        <div>
                                                                            <a rel="nofollow" title="Delete" id="" href="?pages=cart&Delete_Id=<?php echo $Pr_Id
; ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php }
                                                              $_SESSION["Orders"] = $Orders;
                                                              if(!$_SESSION["NumberCart"]){
                                                                echo '<td colspan="4" class="text-right">Không có sản phẩm nào !</td>';
                                                              }
                                                    ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td rowspan="3" colspan="3">
                                                                </td>
                                                                <td colspan="3" class="text-right">Tổng tiền mua sản phẩm</td>
                                                                <td colspan="2" class="price" id="total_product">
                                                                    <?php echo number_format($UnitPrice); ?> VNĐ
                                                                </td>
                                                            </tr>
                                                            <tr style="display: none;">
                                                            </tr>
                                                            <tr class="cart_total_delivery">
                                                                <td colspan="3" class="text-right">Phí ship:</td>
                                                                <td colspan="2">Miễn phí</td>
                                                            </tr>
                                                            <tr style="display:none">
                                                            </tr>
                                                            <tr class="cart_total_price">
                                                                <td colspan="3" class="total_price_container text-right">
                                                                    <span>Trị giá:</span>
                                                                </td>
                                                                <td colspan="2" class="price">
                                                                    <span id="total_price"><?php echo number_format($UnitPrice); ?> VNĐ</span>
                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                </table>
                                            </div>
                                            <div class="m-b-sm">
                                                <!-- end order-detail-content -->
                                                <p class="cart_navigation clearfix text-right">
                                                    <a href="<?php echo home; ?>" class="btn btn-default" title="Continue shopping">
                                                        <i class="icon-chevron-left"></i>Tiếp tục mua hàng
                                                    </a>
                                                    <?php 
                                            if(!$_SESSION["NumberCart"]){
                                                echo '<a class="button btn btn-success standard-checkout button-medium" title="Proceed to checkout">
                                                <span>Thanh toán</span><i class="icon-calendar-empty"></i>
                                            </a>';
                                            }
                                            else {
                                                echo '<a href="?pages=orders" class="button btn btn-success standard-checkout button-medium" title="Proceed to checkout">
                                                <span>Thanh toán</span><i class="icon-calendar-empty"></i>
                                            </a>';
                                            }
                                        ?>
                                                </p>
                                            </div>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            </table>
                        </div>
                        <!-- Controls -->
                    </div>
                </div>
            </div>
        </div>
</section>
