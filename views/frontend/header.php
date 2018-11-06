<html lang="vi" xmlns:fb="http://ogp.me/ns/fb#">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $title; ?>
    </title>
    <!-- Bootstrap -->
    <link href="<?php echo home; ?>/favicon.png" rel="icon" type="image/x-icon">
    <link href="<?php echo home.css; ?>/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo home.css; ?>/font-awesome/css/font-awesome.min.css" type="text/css" />
    <link href="<?php echo home.css; ?>/style.css" rel="stylesheet">
    <link href="<?php echo home.css; ?>/slippry.css" rel="stylesheet">
    <link href="<?php echo home.css; ?>/offcanvas.css" rel="stylesheet">
    <meta property="fb:app_id" content="933702626647915" />
    <meta property="fb:admins" content="nhochocseo">
    <link rel="stylesheet" type="text/css" href="<?php echo home.css; ?>/glasscase.min.css">
    <script type="text/javascript" src="<?php echo home.jquery; ?>/jquery.js"></script>
    <!-- OWL js -->
    <script type="text/javascript" src="<?php echo home.jquery; ?>/owl-carousel/owl.carousel.js"></script>
    <script type="text/javascript" src="<?php echo home.jquery; ?>/modernizr.custom.js"></script>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            appId: '933702626647915',
            xfbml: true,
            version: 'v2.5'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>
</head>

<body>
    <header>
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <p> <img src="images/phone.png"> Điện thoại: 0169.7538.121</p>
                    </div>
                    <div class="col-xs-6 pull-right">
                        <ul class="nav nav-pills pull-right" role="tablist">
                            <li role="presentation" class="active"><a data-toggle="tooltip" data-placement="bottom" title="Giỏ Hàng" href="<?php echo home; ?>/?pages=cart"><span class="glyphicon glyphicon-shopping-cart"> </span><span id="Carts" class="badge"><?php if(isset($_SESSION["NumberCart"])){ echo $_SESSION["NumberCart"]; }else{echo "0";} ?></span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="media-header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-2">
                        <div class="logo-wrapper">
                            <img src="<?php echo home.'/'. $Logo->Value; ?>">
                        </div>
                    </div>
                    <div class="col-xs-10">
                        <div class="box-none col-xs-4">
                            <div class="box-col-inner">
                                <div class="pull-left"> <i class="fa <?php echo $NavBar->Value; ?> fa-3x" aria-hidden="true"></i></div>
                                <div class="media-body">
                                    <h3><?php echo $NavBar->Name; ?></h3> <?php echo $NavBar->Content; ?></div>
                            </div>
                        </div>
                        <div class="box-none col-xs-4">
                            <div class="box-col-inner">
                                <div class="pull-left"> <i class="fa <?php echo $NavBar1->Value; ?> fa-3x" aria-hidden="true"></i></div>
                                <div class="media-body">
                                    <h3><?php echo $NavBar1->Name; ?></h3><?php echo $NavBar1->Content; ?></div>
                            </div>
                        </div>
                        <div class="box-none col-xs-4">
                            <div class="box-col-inner">
                                <div class="pull-left"> <i class="fa <?php echo $NavBar2->Value; ?> fa-3x" aria-hidden="true"></i></div>
                                <div class="media-body">
                                    <h3><?php echo $NavBar2->Name; ?></h3> <?php echo $NavBar2->Content; ?> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="<?php echo home; ?>"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                                <?php 
                                    foreach ($getCategoryParentId as $key) {
                                        echo '<li><a href="?pages=category&id='.$key->Id.'">'.$key->Category_Name.'</a></li>';
                                    }
                                 ?>
                            </ul>
                        </div>
                        <!-- /.nav-collapse -->
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 pull-right box-none">
                    <form action="<?php echo home; ?>/?pages=search" method="POST" class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" name="Search" class="form-control" placeholder="Search" name="q" required="không được để trống">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="btnSearch"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container -->
        </nav>
    </header>
    <!--Start of Tawk.to Script-->
 <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/571655d4a954a3924ca343ca/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script
 -->