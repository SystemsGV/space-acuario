<!-- footer start-->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright 2023 © #################### </p>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- latest jquery-->
<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
<!-- Bootstrap js-->
<script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<!-- feather icon js-->
<script src="<?= base_url() ?>assets/js/icons/feather-icon/feather.min.js"></script>
<script src="<?= base_url() ?>assets/js/icons/feather-icon/feather-icon.js"></script>
<!-- scrollbar js-->
<script src="<?= base_url() ?>assets/js/scrollbar/simplebar.js"></script>
<script src="<?= base_url() ?>assets/js/scrollbar/custom.js"></script>
<!-- Sidebar jquery-->
<script src="<?= base_url() ?>assets/js/config.js"></script>
<!-- Plugins JS start-->
<script src="<?= base_url() ?>assets/js/sidebar-menu.js"></script>
<script src="<?= base_url() ?>assets/js/sidebar-pin.js"></script>
<script src="<?= base_url() ?>assets/js/slick/slick.min.js"></script>
<script src="<?= base_url() ?>assets/js/slick/slick.js"></script>
<script src="<?= base_url() ?>assets/js/header-slick.js"></script>
<script src="<?= base_url() ?>assets/js/height-equal.js"></script>
<script src="<?= base_url() ?>assets/js/animation/wow/wow.min.js"></script>
<script src="<?= base_url() ?>assets/toast/jquery.toast.js"></script>
<script src="<?= base_url() ?>assets/js/cleave/cleave.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<!--DATATABLES -->
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/buttons.colVis.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.keyTable.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.colReorder.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js"></script>
<script src="<?= base_url() ?>assets/js/datatable/datatable-extension/dataTables.scroller.min.js"></script>
<script src="<?= base_url() ?>assets/js/select2/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="<?= base_url() ?>assets/js/script.js"></script>
<!--This page plugins -->
<?php
for ($i = 0; $i < count($scripts); $i++) {
    echo $scripts[$i];
}
?>

</body>

</html>