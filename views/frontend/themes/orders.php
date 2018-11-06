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
                            <a class="btn btn-default btn-sm">01. XEM GIỎ HÀNG</a>
                            <a class="btn btn-success btn-sm">02.NHẬP THÔNG TIN</a>
                            <a class="btn btn-default btn-sm">03.XEM LẠI HÓA ĐƠN</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Thông tin khách hàng</div>
                            <div class="panel-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Họ và tên <span class="text-danger">*</span></label>
                                        <input type="text" name="Name" class="form-control" placeholder="Họ và tên" required="Vui lòng nhập tên bạn">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ <span class="text-danger">*</span></label>
                                        <input type="text" name="address" class="form-control" placeholder="Địa chỉ" required="Vui lòng nhập địa chỉ">
                                    </div>
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="Vui lòng nhập Email">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="text" name="numberphone" class="form-control" placeholder="Số điện thoại" required="Vui lòng nhập số điện thoại liên hệ">
                                    </div>
                                    <div class="form-group">
                                        <label>Tên tài khoản ngân hàng <span class="text-danger">*</span></label>
                                        <input type="text" name="namebank" class="form-control" placeholder="Tên tài khản ngân hàng" required="Vui lòng nhập số tài khản ngân hàng">
                                    </div>
                                    <div class="form-group">
                                        <label>Số tài khoản ngân hàng <span class="text-danger">*</span></label>
                                        <input type="text" name="numberbank" class="form-control" placeholder="Số tài khản ngân hàng" required="Vui lòng nhập số tài khản ngân hàng">
                                    </div>
                                    <button type="submit" name="btn-Orders" class="btn btn-sm btn-primary">Gửi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading font-bold">Hình thức thanh toán</div>
                            <div class="panel-body text-center">
                                <img src="<?php echo home; ?>/images/hinh-thuc-thanh-toan.png" alt="">
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
