<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php echo $title ?>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCt-rrG9KvnpxDWYvAoOIOI61wsD5kPgZ4'></script>
                        <div style='overflow:hidden;height:395px;width:100%;'>
                            <div id='gmap_canvas' style='height:395px;width:100%;'></div>
                            <style>
                            #gmap_canvas img {
                                max-width: none!important;
                                background: none!important
                            }
                            </style>
                        </div>
                        <script type='text/javascript'>
                        function init_map() {
                            var myOptions = {
                                zoom: 12,
                                center: new google.maps.LatLng(<?php echo $getMapId->lat; ?>, <?php echo $getMapId->lng; ?>),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };
                            map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
                            marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(<?php echo $getMapId->lat; ?>, <?php echo $getMapId->lng; ?>)
                            });
                            infowindow = new google.maps.InfoWindow({
                                content: '<strong><?php echo $getMapId->name; ?></strong><br><?php echo $getMapId->address; ?>'
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);
                        </script>
                        <!-- /.box-body -->
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div class="form-horizontal">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Tên cửa Hàng : </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nameshop" class="form-control" placeholder="Tên chửa hàng" value="<?php echo $getMapId->name; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Link" class="col-sm-2 control-label">Địa Chỉ </label>
                                        <div class="col-sm-10">
                                            <input type="text" name="address" class="form-control" placeholder="Địa chỉ ...." value="<?php echo $getMapId->address; ?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-danger" name="btnUpdate" value="Cập Nhập">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
