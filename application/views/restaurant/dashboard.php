
      <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
       
      </div>
    </div>
    <!-- /#page-content-wrapper -->
  </div>
  <!-- /#wrapper -->
   
  <script src="<?php echo base_url('assets/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
