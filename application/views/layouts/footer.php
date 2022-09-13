<footer class="footer">
  <div class="container">
    <div class="d-sm-flex justify-content-center">
      <span class="text-muted d-block text-center">Copyright  2021</span>

    </div>
  </div>

  <script>
    $(document).ready(function() {
      var date_input = $('input[name="date"]'); //our date input has the name "date"
      var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
      var options = {
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
  </script>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="<?php echo base_url('assets/vendors/js/vendor.bundle.base.js') ?>"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?php echo base_url('assets/vendors/jquery-bar-rating/jquery.barrating.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot/jquery.flot.resize.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot/jquery.flot.categories.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot/jquery.flot.fillbetween.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/flot/jquery.flot.stack.js') ?>"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?php echo base_url('assets/js/off-canvas.js') ?>"></script>
<script src="<?php echo base_url('assets/js/hoverable-collapse.js') ?>"></script>
<script src="<?php echo base_url('assets/js/misc.js') ?>"></script>
<script src="<?php echo base_url('assets/js/settings.js') ?>"></script>
<script src="<?php echo base_url('assets/js/todolist.js') ?>"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="<?php echo base_url('assets/js/dashboard.js') ?>"></script>

<!-- End custom js for this page -->
<script src="<?php echo base_url('assets/vendors/jquery-validation/jquery.validate.min.js') ?>"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script> -->

<script src="<?php echo base_url('assets/vendors/datatables.net/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') ?>"></script>
<script src="<?php echo base_url('assets/js/data-table.js"></script') ?>"></script>

  </body> 
  </html>