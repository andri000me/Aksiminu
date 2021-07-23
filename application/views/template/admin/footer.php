<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; AKSI MINU 2020</span>
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
            <div class="modal-body">Anda yakin untuk Logout dari AKSI MINU? Jika Ya, tekang tombol "Logout".</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('template/sbadmin/vendor/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('template/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('template/sbadmin/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('template/sbadmin/js/sb-admin-2.min.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('template/sbadmin/vendor/chart.js/Chart.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('template/sbadmin/js/demo/chart-area-demo.js') ?>"></script>
<script src="<?= base_url('template/sbadmin/js/demo/chart-pie-demo.js') ?>"></script>
<script src="<?= base_url('template/sbadmin/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('template/sbadmin/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('template/sbadmin/js/demo/datatables-demo.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#edit-ref', function() {
            var idref_edit = $(this).data('idref_edit');
            var judul_edit = $(this).data('judul_edit');
            var dokumen_edit = $(this).data('dokumen_edit');
            var dokumen_data = $(this).data('dokumen_data');
            $('#idref_edit').val(idref_edit);
            $('#judul_edit').val(judul_edit);
            $('#dokumen_edit').val(dokumen_edit);
            $('#dokumen_data').val(dokumen_data);
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#edit-user', function() {
            var iduser_edit = $(this).data('iduser_edit');
            var idprofile_edit = $(this).data('idprofile_edit');
            var username_edit = $(this).data('username_edit');
            var password_edit = $(this).data('password_edit');
            var namalengkap_edit = $(this).data('namalengkap_edit');
            $('#idprofile_edit').val(idprofile_edit);
            $('#iduser_edit').val(iduser_edit);
            $('#username_edit').val(username_edit);
            $('#password_edit').val(password_edit);
            $('#namalengkap_edit').val(namalengkap_edit);
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#data-user', function() {
            var iduser_det = $(this).data('iduser_det');
            var username_det = $(this).data('username_det');
            var password_det = $(this).data('password_det');
            var namalengkap_det = $(this).data('namalengkap_det');
            var kotama_det = $(this).data('kotama_det');
            var satker_det = $(this).data('satker_det');
            var telepon_det = $(this).data('telepon_det');
            var tingkat_det = $(this).data('tingkat_det');
            var photo_det = $(this).data('photo_det');
            var terdaftar_det = $(this).data('terdaftar_det');
            $('#iduser_det').val(iduser_det);
            $('#username_det').val(username_det);
            $('#password_det').val(password_det);
            $('#namalengkap_det').val(namalengkap_det);
            $('#kotama_det').val(kotama_det);
            $('#satker_det').val(satker_det);
            $('#telepon_det').val(telepon_det);
            $('#tingkat_det').val(tingkat_det);
            $('#photo_det').html(photo_det);
            $('#terdaftar_det').val(terdaftar_det);
        })
    });
</script>

</body>

</html>