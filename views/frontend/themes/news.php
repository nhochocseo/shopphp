<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("/../sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="row">
                    <div class="title">
                        <h4><?php echo $NameCategoryParent.' <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$NameCategory.' <i class="fa fa-chevron-circle-right" aria-hidden="true"></i> '.$getPostId->Name_Post ?></h4>
                    </div>
                    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                        <ul class="nav nav-tabs" id="myTabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#Content" id="Content-tab" role="tab" data-toggle="tab" aria-controls="Content" aria-expanded="true">Nội Dung</a>
                            </li>
                            <li role="presentation" class="">
                                <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Bình luận</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active in" role="tabpanel" id="Content" aria-labelledby="Content-tab">
                                <div class="post-content">
                                    <p>
                                        <?php echo $getPostId->Content_Post; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="profile" aria-labelledby="profile-tab">
                                <div class="panel-facebook">
                                    <div class="fb-comments" data-href="http://gioitreit.com" data-numposts="5"></div>
                                </div>
                            </div>
                        </div>
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
                            ?>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {

    var owl = $("#owl-demo");



    owl.owlCarousel({

        margin: 10,

        loop: true,

        autoWidth: true,

        items: 3,

        autoPlay: 5000

    });



    // Custom Navigation Events

    $(".next").click(function() {

        owl.trigger('owl.next');

    })

    $(".prev").click(function() {

        owl.trigger('owl.prev');

    })



});
</script>
<script type="text/javascript" src="<?php echo home.jquery; ?>/jquery.glasscase.min.js"></script>
<script type="text/javascript">
$(document).ready(function(event) {

    $('.pInstructions').hide();

    //ZOOM

    $("#sliderright").glassCase({

        'widthDisplay': 650,

        'heightDisplay': 650,

        'isSlowZoom': true,

        'zoomPosition': 'inner',

        'isSlowLens': true,

        'capZType': 'in',

        'thumbsPosition': 'bottom',

        'isHoverShowThumbs': true,

        'colorIcons': '#48A7D4',

        'colorActiveThumb': '#48A7D4',

        'mouseEnterDisplayCB': function() {

            $('.pInstructions').text('Click to open expanded view');

        },

        'mouseLeaveDisplayCB': function() {

            $('.pInstructions').text('Roll over image to zoom in');

        }

    });

    setTimeout(function() {

        $('.pInstructions').css({

            'width': $('.gc-display-area').outerWidth(),

            'left': parseFloat($('.gc-display-area').css('left'))

        });

        $('.pInstructions').fadeIn();

    }, 1000);



    $('#btnFeatures').on('click', function() {

        $('html, body').animate({

            scrollTop: $('.tc-all-features').offset().top - 50 + 'px'

        }, 800);

    });

});
</script>
