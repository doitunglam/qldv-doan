
<script>
    var baseurl = "<?php echo url('/'); ?>";
</script>
<script src="<?php echo url('/'); ?>/js/jquery-2.2.3.min.js"></script>
<script src="<?php echo url('/'); ?>/js/printThis.js"></script>
<script src="<?php echo url('/'); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo url('/'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo url('/'); ?>/plugins/jquery.printElement.min.js"></script>
<script src="<?php echo url('/'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo url('/'); ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo url('/'); ?>/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo url('/'); ?>/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo url('/'); ?>/plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo url('/'); ?>/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo url('/'); ?>/js/app.min.js"></script>
<script src="<?php echo url('/'); ?>/js/common.js"></script>

<script>
    $(function() {
        $('select').select2();
        $('#datepicker,#datepicker2').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        $('input[type="checkbox"].minimal-blue, input[type="radio"].minimal-blue').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });
    });
</script>
