<footer class="main-footer">
    <div class="container">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; <?= date('Y') ?> <a href="https://github.com/dicky54putra">Dicky54putra</a>.</strong> All rights reserved.
    </div><!-- /.container -->
</footer>
</div><!-- ./wrapper -->
<!-- jQuery 2.1.4 -->
<script src="<?= base_url('assets/') ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?= base_url('assets/') ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/') ?>plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/') ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/') ?>dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url('assets/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>plugins/datatables/dataTables.bootstrap.min.js"></script>

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