<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.0-beta.1
    </div>
    <strong>Copyright &copy; 2014-2018 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('asset'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>


<script src="<?= base_url('asset'); ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset'); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset'); ?>/dist/js/demo.js"></script>
<script src="<?= base_url('asset'); ?>/dist/js/alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url('asset'); ?>/dist/js/alert/myscript.js"></script>
<script>
    $(function() {

        $('#example1').DataTable({
            "responsive": true,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": false,
            "autoWidth": true

            /* dom: 'Bfrtip',*/
            /*  dom: 'Bfrtip',
              buttons: [{
                      extends: 'pdf',
                      oriented: 'potrait',
                      pageSize: 'Legal',
                      download: 'open'
                  },
                  'csv', 'excel', 'print', 'copy', 'pdf'
              ]*/
        });
    });
</script>

</body>

</html>