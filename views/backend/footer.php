</div>
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2016 <a href="fb.com/nhochocseo">Cao Dũng</a>.</strong> All rights reserved.
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div  id="control-sidebar-home-tab">
            <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- <script type="text/javascript" src="./views/backend/js.php"></script> -->
<script src="<?php echo home; ?>/views/backend/themes/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo home; ?>/views/backend/themes/dist/js/app.min.js"></script>
<script src="<?php echo home; ?>/views/backend/themes/dist/js/demo.js"></script>
<!-- FastClick -->
<script src="<?php echo home; ?>/views/backend/themes/plugins/fastclick/fastclick.js"></script>
<?php echo $js; ?>
<script>
$(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});
</script>
</body>

</html>
