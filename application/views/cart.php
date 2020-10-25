<?php $type =  $this->session->login_session['user_type']; ?>
<main role="main">
  <br>
  <style>
    .veg {
      color: green;
    }
    .non-veg {
      color: red;
    }
  </style>
  <div class="container marketing">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="row featurette">
      <p class="col-md-12 lead"> Your Cart</p>
      <div class="table-responsive">
        <table class="table table-hover   ">
          <tbody>
            <form class="" method="post" action="<?php echo site_url('Foodshala/place_order/') ?>" enctype="multipart/form-data">
              <?php
              if ($type == 'restaurants') {
                echo 'Please Login as a customer';
              } else {
                if (!$cart_items) {
                  echo 'No items please browse all the dishes and add delicious food items to the cart ';
                } else {
                  $i = $total_cost = 0;
                  foreach ($cart_items as $row) {
                    $total_cost = $row->cost + $total_cost ?>
                    <tr>
                      <th scope="row"><?php echo ++$i; ?></th>
                      <td> <input name="food_id[]" type="hidden" readonly  value="<?php echo $row->food_id ?>" class="form-control" placeholder="Contact" required>
                        <span class=" <?php echo $row->dish_type ?> lead">
                          <?php echo ucwords($row->food_name); ?></span>
                        <br>from: <?php echo ucwords($row->res_name); ?></td>
                      <td><i class="fa fas fa-inr"></i> <?php echo $row->cost; ?>/-</td>
                      <td><a role="button" class="ml-3 btn btn-outline-danger btn-sm " onclick="return confirm('Are you sure?')" href="
			<?php echo site_url('Foodshala/remove_from_cart/') . $row->id ?>"> Remove </a></td>
                    </tr>
                  <?php } ?>
                  <tr class="table-info">
                    <td colspan="2"> Total Items: <?php echo $i; ?></td>
                    <td colspan="2"><i class="fa fas fa-inr"></i> <?php echo $total_cost; ?>/-</td>
                  </tr>
          </tbody>
        </table>
      </div>
    </div><span class="float-right">
      <button class="btn btn-lg btn-outline-primary " type="submit">Place Order</button>
    </span>
<?php }
              } ?>
</form>
  </div>
  <hr class="featurette-divider">