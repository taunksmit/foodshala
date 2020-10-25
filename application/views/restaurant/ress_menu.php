
      <div class="container-fluid">
        <h3 class="mt-4">Menu</h3>
		    <?php echo $this->session->flashdata('msg'); ?>
		<div class="table-responsive">
	 <table>
	  <table class="table table-hover">
  <thead>
    <tr class="table-primary">
      <th scope="col">S.No</th>
       <th scope="col">Food Name</th>
      <th scope="col">Type</th>
      <th scope="col">Serves</th>
      <th scope="col">Cost</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
     <?php $i=0 ; foreach($menu as $key){ ;?>
    <tr class="table-light">
      <th scope="row"><?php echo ++$i;?></th>
       <td><?php echo ucfirst($key->food_name)?></td>
      <td><?php echo $key->dish_type?></td>
      <td><?php echo $key->serves?></td>
      <td><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $key->cost?></td>
      <td> <a role="button" class="btn btn-danger btn-sm " onclick="return confirm('Are you sure?')" href="<?php echo site_url('Foodshala/delete_food/'.$key->food_id) ?>"> <i class="fa fa-trash" aria-hidden="true"></i> Delete  </a>&nbsp;  </td>
	   
	  
       
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
   
  <script src="<?php echo base_url('assets/jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap.bundle.min.js')?>"></script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
</body>
</html>
