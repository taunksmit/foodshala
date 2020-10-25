 <!-- FOOTER -->
 <footer class="container">
   <p class="float-right"><a href="#">Back to top</a></p>
   <p class="lead"> FoodShala - An online food ordering system.</p>
   <p>This is an MVP designed and developed by Smit Taunk for Internshala</p>
   <p><a target="_blank" href="<?php echo base_url('assets/foodshala_st_documentation.pdf') ?>">Documentation</a></p>
   <p>
     <a href="<?php echo base_url('assets/resume_smit_taunk.pdf') ?>">Smit Taunk's Resume</a>
     <a target="_blank" href="https://www.linkedin.com/in/taunksmit/"><i class="ml-2 fab fa-linkedin-in"></i></a>
     <a class="m-2" target="_blank" href="mailto:taunksmit@gmail.com"><i class="fa fa-envelope"></i></a>
   </p>
 </footer>
 </main>
 <script src="<?php echo base_url(); ?>assets/js/slim.js">
 </script>
 <script>
   window.addEventListener("load", function() {
     const loader = document.querySelector(".loader");
     loader.className += " hidden";
   });
 </script>
 <script>
   $(document).ready(function() {
     $('[data-toggle="tooltip"]').tooltip();
   });
 </script>
 <script>
   window.jQuery || document.write(
     '<script src="<?php echo base_url(); ?>/assets/js/vendor/jquery.slim.min.js"><\/script>')
 </script>
 <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
 <!-- Login Modal -->
 <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title text-primary" id="exampleModalLongTitle" style="font-weight: 600;">Login to
           FoodShala</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <form autocomplete="off" method="post" action="<?php echo site_url('Login/check_login/') ?>">
         <div class="modal-body">
           <div class="form-group">
             <label for="exampleInputEmail1">Email address</label>
             <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off">
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
           </div>
         </div>
         <div class="modal-footer">
           <button type="submit" class="btn btn-primary">Login</button>
           <p>Forgot password ?</p>
         </div>
       </form>
     </div>
   </div>
 </div>
 <!-- Login Modal end -->
 </html>