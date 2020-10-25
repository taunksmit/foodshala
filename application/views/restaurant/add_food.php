<div class="container-fluid">
  <h3 class="mt-4">Add Food Item</h3>
  <form class="form-signin" method="post" action="<?php echo site_url('Foodshala/save_food/') ?>" enctype="multipart/form-data">
    <fieldset>
      <div class="form-group col-md-6">
        <label class="col-form-label " for="inputSmall">Dish Name</label>
        <input name="food_name" class="form-control form-control-sm" type="text" placeholder="Enter Dish Name" id="inputSmall">
      </div>
      <div class="col-md-6 form-group">
        <label for="dish_type" class="mr-4">Dish Type&nbsp;</label>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="veg" value="veg" required name="dish_type" class="custom-control-input">
          <label class="custom-control-label" for="veg">Veg</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="nonveg" required value="nonveg" name="dish_type" class="custom-control-input">
          <label class="custom-control-label" for="nonveg">Non Veg</label>
        </div>
      </div>
      <div class="col-md-8 form-group">
        <label class="mr-5">Serves </label>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="1" value="1" required name="serves" class="custom-control-input">
          <label class="custom-control-label" for="1">1 (One)</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="2" value="2" required name="serves" class="custom-control-input">
          <label class="custom-control-label" for="2">2 (Two)</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="3" value="3" required name="serves" class="custom-control-input">
          <label class="custom-control-label" for="3">3 (Three)</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="4" value="4" required name="serves" class="custom-control-input">
          <label class="custom-control-label" for="4">4 (Four)</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="5" value="5" required name="serves" class="custom-control-input">
          <label class="custom-control-label" for="5">5 (Five)</label>
        </div>
      </div>
      <div class="form-group col-md-6">
        <label for="image">Dish Picture</label>
        <input required id="image" class="btn" type="file" name="atta1" name="picture" type="file" class="form-control-file" id="atta1" placeholder="   Picture" accept="image/x-png,image/jpeg" />
        <small id="fileHelp" class="form-text text-muted">Add a refrence image for the dish to help Customers.</small>
      </div>
      <div class="col-md-6 form-group">
        <label for="cost">Cost</label>
        <input type="number" required class="form-control form-control-sm" name="cost" id="cost" placeholder="Enter Dish Cost">
      </div>
      <button type="submit" class="mt-3 btn btn-primary"><i class="fa fa-plus"></i> &nbsp;Add Food Item</button>
    </fieldset>
  </form>
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