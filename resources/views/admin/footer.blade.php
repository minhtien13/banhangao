</div>
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>

</div>
<!-- jQuery -->
<script src="/template/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="/template/admin/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="/template/admin/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/admin/dist/js/demo.js"></script>
<script src="/template/admin/main/js/main.js"></script>
<script>
  CKEDITOR.replace('content');
</script>
<!-- Page specific script -->
<script>
$(function () {
$.validator.setDefaults({
  submitHandler: function () {
    alert( "Form successful submitted!" );
  }
});
$('#quickForm').validate({
  rules: {
    email: {
      required: true,
      email: true,
    },
    password: {
      required: true,
      minlength: 5
    },
    terms: {
      required: true
    },
  },
  messages: {
    email: {
      required: "Please enter a email address",
      email: "Please enter a valid email address"
    },
    password: {
      required: "Please provide a password",
      minlength: "Your password must be at least 5 characters long"
    },
    terms: "Please accept our terms"
  },
  errorElement: 'span',
  errorPlacement: function (error, element) {
    error.addClass('invalid-feedback');
    element.closest('.form-group').append(error);
  },
  highlight: function (element, errorClass, validClass) {
    $(element).addClass('is-invalid');
  },
  unhighlight: function (element, errorClass, validClass) {
    $(element).removeClass('is-invalid');
  }
});
});
</script>
</body>
</html>
