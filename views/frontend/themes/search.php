<script type="text/javascript">
$(document).ready(function() {
    // $("#text_input").watermark("Nhập Từ Cần Tìm Kiếm"); // Watermart cho khung nhập
    var dataString = 'keyword=<?php echo $Search; ?>' ;
    $.ajax({
                type: "GET", // Phương thức gọi là GET
                url: "?load=ajax-search", // File xử lý
                data: dataString, // Dữ liệu truyền vào
                beforeSend: function() { // add class "loading" cho khung nhập
                    $('input#text_input').addClass('loading');
                },
                success: function(server_response) // Khi xử lý thành công sẽ chạy hàm này
                    {
                        $('#searchresultdata').html(server_response).show(); // Hiển thị dữ liệu vào thẻ div #searchresultdata

                        if ($('input#text_input').hasClass("loading")) { // Kiểm tra class "loading"
                            $("input#text_input").removeClass("loading"); // Remove class "loading"
                        }
                    }
            });

    $("#text_input").keyup(function() {
        var text_input = $(this).val(); // Lấy giá trị search của người dùng
        var dataString = 'keyword=' + text_input; // Lấy giá trị làm tham số đầu vào cho file ajax-search.php
        if (text_input.length > 3) // Kiểm tra giá trị người nhập có > 3 ký tự hay ko
        {
            $.ajax({
                type: "GET", // Phương thức gọi là GET
                url: "?load=ajax-search", // File xử lý
                data: dataString, // Dữ liệu truyền vào
                beforeSend: function() { // add class "loading" cho khung nhập
                    $('input#text_input').addClass('loading');
                },
                success: function(server_response) // Khi xử lý thành công sẽ chạy hàm này
                    {
                        $('#searchresultdata').html(server_response).show(); // Hiển thị dữ liệu vào thẻ div #searchresultdata
                        $('span#title_keyword').html(text_input); // Hiển thị giá trị search của người dùng

                        if ($('input#text_input').hasClass("loading")) { // Kiểm tra class "loading"
                            $("input#text_input").removeClass("loading"); // Remove class "loading"
                        }
                    }
            });
        }
        return false; // Không chuyển trang
    });

});
</script>
<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("/../sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="title">
                    <h4>Tìm kiếm : <span id="title_keyword">Keyword </span> (> 3 kí tự)
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
                <div id="prod-content">
                    <!-- #prod-content   -->
                    <div class="prod-subcontent">
                        <div class="faqsearch">
                            <div class="search-box">
                                <!-- Khung Search  -->
                                <input class='form-control' type="text" value="<?php echo $Search; ?>" id="text_input" />
                                <button class='btn btn-link search-btn'> <i class='glyphicon glyphicon-search'></i> </button>
                                <!-- END Khung Search   -->
                            </div>
                        </div>
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                                <div id="searchresultdata" class="faq-articles"> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END #prod-content   -->
            </div>
            <!-- Controls -->
        </div>
    </div>
    </div>
    </div>
</section>
