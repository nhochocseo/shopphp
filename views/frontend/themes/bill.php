<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("/../sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <section class="carts">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9">
                                <div class="list-group">
                                    <div class="btn-group btn-group-justified">
                                        <a class="btn btn-default btn-sm">01. XEM GIỎ HÀNG</a>
                                        <a class="btn btn-default btn-sm">02.NHẬP THÔNG TIN</a>
                                        <a class="btn btn-success btn-sm">03.XEM LẠI HÓA ĐƠN</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="panel-success" draggable="true">
                                            <div class="panel-heading">
                                                <h1>Thông tin bạn đã được cập nhật ! chúng tôi sẽ liên hệ cho bạn trong thời gian sớm nhật</h1>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading font-bold">
                                                Thông tin đã điền
                                            </div>
                                            <table class="table table-striped m-b-none">
                                                <tbody>
                                                    <tr>
                                                        <td class="font-bold">
                                                            Hóa đơn số
                                                        </td>
                                                        <td>
                                                            #
                                                            <?php echo $getOrdersId->Id; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Họ và tên
                                                        </td>
                                                        <td>
                                                            <?php echo $getOrdersId->Name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Địa chỉ
                                                        </td>
                                                        <td>
                                                            <?php echo $getOrdersId->Address; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email
                                                        </td>
                                                        <td>
                                                            <?php echo $getOrdersId->Email; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Số điện thoại
                                                        </td>
                                                        <td>
                                                            <?php echo $getOrdersId->Phone_Number; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Tên tài khoản ngân hàng
                                                        </td>
                                                        <td>
                                                            <?php echo $getOrdersId->Bank_Name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Số tài khoản ngân hàng
                                                        </td>
                                                        <td>
                                                            <?php echo $getOrdersId->Bank_Account; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading font-bold">
                                                Danh sách sản phẩm
                                            </div>
                                            <table class="table table-striped m-b-none">
                                                <thead>
                                                    <tr>
                                                        <th>Mã Sản Phẩm</th>
                                                        <th>Tên Sản Phẩm </th>
                                                        <th>Số Lượng</th>
                                                        <th>Giá</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                    $UnitPrice = "";
                                foreach ($getListProductByOrdersId as $getOrdersProduct) {
                                    $gia = ((100-$getOrdersProduct->DissCount)/100) * $getOrdersProduct->Price;
                                    $UnitPrice = $UnitPrice+($gia*$getOrdersProduct->Card_Id);
                                    echo "<tr>";
                                        echo '<td>'.$getOrdersProduct->Product_Id.'</td>';
                                        echo '<td>'.$getOrdersProduct->Product_Name.'</td>';
                                        echo '<td>'.$getOrdersProduct->Card_Id.'</td>';
                                        echo '<td>'.Price_Dots($getOrdersProduct->Price).'</td>';
                                    echo "</tr>";
                                }
                                ?>
                                                </tbody>
                                            </table>
                                            <footer class="panel-footer">
                                                <div class="row">
                                                    <div class="col-sm-12 hidden-xs">
                                                        <div class="col-sm-12 text-center">
                                                            <small class="text-danger inline m-t-sm m-b-sm">Tổng tiền cần thanh toán: <?php echo Price_Dots($UnitPrice); ?></small>
                                                        </div>
                                                    </div>
                                            </footer>
                                            <div class="panel-success" draggable="true">
                                                <div class="panel-heading">
                                                    <h1>(*) Lưu ý: Nếu quý khác thanh toán qua chuyển khoản vui lòng ghi nội dung chuyển khoản là: "Thanh toán cho hóa đơn số #### (số hóa đơn)"</h1>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </footer>
                    </div>
            </div>
</section>
