<?php require_once("../resources/config.php")?>
<?php include(TEMPLATE_FRONT . DS ."header.php")?> 
  <h1 class="page-header" style="padding-left: 10%">
       User Registration
       <br>
      <small>Please fill in this form to create an account.</small>
      <br>
  </h1>
  <?php user_register(); ?>
<form action="" method="post" enctype="multipart/form-data">
  <div class="col-md-6 user_image_box" style="padding-left:10%">
 <i class="fa fa-user-plus fa-5x" aria-hidden="true"></i>
<hr>
<!-- <img src="https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !" alt="Image Not Found"> -->
<p><input type="file"  accept="image/*" name="file" id="file"  onchange="loadFile(event)" style="display: none;"></p>
<p><img id="output" height="350" width="500"/></p>

<script>
var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

</div>
<!-- <form action="" method="post" enctype="multipart/form-data"> -->


  <div class="col-md-6">

    <div class="form-group"> 
      <p><label for="file" style="cursor: pointer; font-weight: bold; color: #B4886B; display: block; ">Upload Image</label></p> 
     </div>



     <div class="form-group">
      <label for="custname">Name</label>
      <input type="text" name="custname" class="form-control" > 
     </div>


     <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" class="form-control" >         
     </div>


     <div class="form-group">
      <label for="contact">Mobile No.</label>
      <input type="text" name="contact" class="form-control" > 
     </div>


      <div class="form-group">
          <label for="email">Email</label>
      <input type="text" name="email" class="form-control"   >
         
     </div>

      <div class="form-group">
          <label for="address">Address</label>
      <input type="text" name="address" class="form-control"   >
         
     </div> 
<!-- 
      <div class="form-group">
          <label for="last name">Last Name</label>
      <input type="text" name="last_name" class="form-control"   >
         
     </div> -->


      <div class="form-group">
          <label for="password">Password</label>
      <input type="password" name="psw" class="form-control"  >
         
     </div>

      <div class="form-group">

      <input type="submit" name="register" class="btn btn-primary pull-right" value="Register" >
         
     </div>


      

  </div>



</form>






<?php include(TEMPLATE_FRONT . DS ."footer.php")?>
