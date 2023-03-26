<div class="col-md-3">
	<h2 style="font-size: 36px;font-weight: bold; color:#3ec1d5;font-family:sans-serif;">
		<?php if (isset($_SESSION['username'])) 
			{
	            # code...
	            $user = $_SESSION['username'];
	            echo "Hi ".$user ;
	        }else
		        {
		          "Hello User !";
		        }
		  
         ?>            
        </h2>
	<p class="lead">Categories</p>
	<div class="list-group">
		<?php 
		get_categories();
		?> 	
	</div>
</div> 