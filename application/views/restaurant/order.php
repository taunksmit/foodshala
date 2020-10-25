<div class="container-fluid">
  <h3 class="mt-4">Orders</h3>
  <?php echo $this->session->flashdata('msg'); ?>
  <div class="table-responsive">
    <table>
      <table class="table table-hover">
        <thead>
          <tr class="table-primary">
            <th scope="col">S.No</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Food Name</th>
            <th scope="col">Type</th>
            <th scope="col">Cost</th>
          </tr>
        </thead>
        <?php $i = 0;
        foreach ($list as $key) {; ?>
          <tr class="table-light">
            <th scope="row"><?php echo ++$i; ?></th>
            <td><?php echo ucfirst($key->cust_name) ?></td>
            <td><?php echo ucfirst($key->food_name) ?></td>
            <td><?php echo $key->dish_type ?></td>
            <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $key->cost ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </table>
  </div>
</div>
</div>
<!-- /#page-content-wrapper -->
</div>
<!-- /#wrapper -->
<script src="<?php echo base_url('assets/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap.bundle.min.js') ?>"></script>
<!-- Menu Toggle Script -->
<script>
  $("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });
</script>
</body>
</html>