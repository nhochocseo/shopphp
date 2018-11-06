<section class="content">
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-left">
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas">
                <?php include("/../sidebar.php"); ?>
            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="title">
                    <h4>Địa chỉ shop</h4>
                </div>
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
                <!-- Controls -->
            </div>
        </div>
    </div>
    </div>
</section>
