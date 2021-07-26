
<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script type="text/javascript" src="bower_components/datatable/datatables.min.js"></script>


<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#tbl_record').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [  'excel' ]
        });
    });
</script>
</body>
</html>