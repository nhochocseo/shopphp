<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header">
            </div>
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading font-bold">
                            Thông tin khách hàng
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
                                    $UnitPrice = 0;
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
                        <div class="col-xs-4 box-body">
                            <!-- select -->
                            <div class="form-group">
                                <div class="col-xs-7">
                                    <form action="" method="post">
                                        <select name="Status" class="form-control">
                                        <option value='1'<?php if($getOrdersId->Status == 1) { echo 'selected';} ?>>Trạng Thái</option>
                                            <option value='2'<?php if($getOrdersId->Status == 2) { echo 'selected';} ?>>Đã hoàn thành</option>
                                            <option value='3' <?php if($getOrdersId->Status == 3) { echo 'selected';} ?>>Hủy hóa đơn</option>
                                        </select>
                                </div><div class="col-xs-5">
                                <button name="btn-Status" type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                                </form>
                            </div>
                            <div class="col-xs-9">
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
    </section>
