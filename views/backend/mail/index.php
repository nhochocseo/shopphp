<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Mailbox
        <small>Gửi mail xác nhận hóa đơn</small>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col -->
            <form class="frm-add" method="POST" enctype="multipart/form-data" action="admin.php?page=sendmail">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Message : <?php if(isset($_GET["to"])){echo $_GET["to"];} ?></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <input class="form-control" name="mailto" value="<?php if(isset($_GET["to"])){echo $_GET["to"];} ?>" placeholder="To:">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="title" placeholder="Subject:">
                            </div>
                            <div class="form-group">
                                <textarea id="compose-textarea" name="content" class="form-control" style="height: 300px"></textarea>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" name="btnsend" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </div>
            </form>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
$(function() {
    //Add text editor
    $("#compose-textarea").wysihtml5();
});
</script>
