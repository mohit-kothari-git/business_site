<div id="page-wrapper">
    <?php 
    if(isset($_GET['update_order_id']))
    {
        $query = query("SELECT * FROM orders WHERE order_id = " . escape_string($_GET['update_order_id']) . " ");
        confirm($query);
        while($row = fetch_array($query))
        {
            $order_amount        = escape_string($row['order_amount']);
            $tran_id             = escape_string($row['tran_id']);
            $Status              = escape_string($row['Status']);
            $order_date          = escape_string($row['order_date']);
            $username          = escape_string($row['username']);
            /*$product_quantity    = escape_string($row['product_quantity']);
            $product_image       = escape_string($row['product_image']);
            $product_image = display_image_loc($row['product_image']);*/
        }
    }
    ?>
    <div class="container-fluid">                               
        <div class="col-md-12">
            <div class="row">
            <h1 class="page-header">
               Edit Order Status
            </h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">


            <div class="col-md-8">

            <div class="form-group">
                <label for="product-title">Order Amount</label>
                    <input type="text" name="order_amount" class="form-control" value= "<?php echo $order_amount; ?>" >
                   
                </div>


                <div class="form-group">
                       <label for="product-title">Order Date</label>
                  <textarea name="order_date" id="" cols="30" rows="2" class="form-control"><?php echo $order_date; ?></textarea>
                </div>



                  <!-- <div class="form-group row">
                  <div class="col-xs-3">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="Status" class="form-control" size="60">
                  </div>
                </div> -->
                <!-- Short Description Of Product -->
                <div class="form-group">
                       <label for="product-title">Customer Name</label>
                  <textarea name="username" id="" cols="30" rows="3" class="form-control"><?php echo $username; ?></textarea>
                </div>


                
                

            </div><!--Main Content-->


            <!-- SIDEBAR-->


            <aside id="admin_sidebar" class="col-md-4">

                 
                 <div class="form-group">
                    <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
                    <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
                </div>


                 <!-- Product Categories-->

                <div class="form-group">
                     <label for="product-title">Product Category</label>
                    <select name="tran_id" id="" class="form-control">
                        <option value="<?php echo $tran_id; ?>"><?php echo display_categories_in_view_products($tran_id); ?></option>
                        <?php show_categories(); ?>           
                    </select>
                </div>
                <!-- Product Price  -->
                <div class="form-group">
                    <label for="product-price">Product Price</label>
                    <input type="number" name="Status" class="form-control" size="60" value="<?php echo $Status; ?>">
                </div>



                <!-- Product Brands-->


                <div class="form-group">
                  <label for="product-title">Product Quantity</label>
                     <input type="number" name="product_quantity" class="form-control" value="<?php echo $product_quantity; ?>"> 
                </div>


            <!-- Product Tags -->


                <!-- <div class="form-group">
                      <label for="product-title">Product Keywords</label>
                      <hr>
                    <input type="text" name="product_tags" class="form-control">
                </div> -->

                <!-- Product Image -->
                <!-- <div class="form-group">
                    <label for="product-title">Product Image</label>
                    <input type="file" name="file" id="file"> 
                    <br>
                    <img  width = "320" src="../../resources/<?php //echo $product_image; ?>">     
                </div> -->
            </aside><!--SIDEBAR-->               
            </form>
            </div>
                        <!-- /.container-fluid -->

        </div>
                <!-- /#page-wrapper -->

    </div>
            <!-- /#wrapper -->
                