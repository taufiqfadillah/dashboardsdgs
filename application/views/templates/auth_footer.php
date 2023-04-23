<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- reCaptcha -->
<script>
    $(document).ready(function() {
        $('#login').submit(function(event) {
            event.preventDefault();
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                alert("Please verify that you are not a robot.");
                return false;
            } else {
                this.submit();
            }
        });
    });
</script>

</body>

</html>