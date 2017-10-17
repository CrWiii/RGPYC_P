    <script src="{{ asset('vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('dist/js/dataTables-data.js') }}"></script>
	<script src="{{ asset('dist/js/jquery.slimscroll.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>
	<script src="{{ asset('dist/js/dropdown-bootstrap-extended.js') }}"></script>
	<script src="{{ asset('dist/js/init.js') }}"></script>
<script>
window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
]); ?>
</script>
