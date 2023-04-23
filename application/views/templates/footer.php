            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://www.instagram.com/twfq_f/"> Taufiq Fadillah </a><?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>


            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
            <script src="https://kit.fontawesome.com/8db68faa2b.js" crossorigin="anonymous"></script>

            <!-- MaskMoney plugin -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>

            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <script src="<?= base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Wizard -->
            <script src="<?= base_url('assets'); ?>/js/jquery.steps.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

            <!-- SweetAlert2 plugin -->
            <script src="<?= base_url('assets'); ?>/js/sweetalert2.all.min.js"></script>
            <script src="<?= base_url('assets'); ?>/js/myscript.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets'); ?>/js/sb-admin-2.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#form1").validate();
                });
            </script>

            <script>
                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });

                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });
            </script>

            <!-- Page level plugins -->
            <script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/jszip/jszip.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/pdfmake.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/pdfmake/vfs_fonts.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.html5.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.print.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?= base_url(); ?>assets/vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>


            <script type="text/javascript">
                $(function() {
                    $('.date').datepicker({
                        uiLibrary: 'bootstrap4',
                        format: 'yyyy-mm-dd'
                    });

                    var start = moment().subtract(29, 'days');
                    var end = moment();

                    function cb(start, end) {
                        $('#tangal').val(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'));
                    }
                    cb(start, end);
                });

                $(document).ready(function() {
                    var table = $('#dataTable').DataTable({
                        buttons: ['copy', 'print', 'excel', 'pdf'],
                        dom: "<'row px-2 px-md-4 mb-3 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
                            "<'row'<'col-md-12'tr>>" +
                            "<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
                        lengthMenu: [
                            [5, 10, 25, 50, 100, -1],
                            [5, 10, 25, 50, 100, "All"]
                        ],
                        columnDefs: [{
                            targets: -1,
                            orderable: false,
                            searchable: false
                        }]
                    });

                    table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
                });
            </script>


            </body>

            </html>