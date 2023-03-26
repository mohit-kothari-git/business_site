<div class="col-md-12">
    <div class="row">
      <h3 class="bg-success"><?php display_message(); ?></h3>
        <h1 class="page-header">
            <form action="" method="post" enctype="multipart/form-data" class="form-inline">
             <div class="form-group"> 
                 <h2 style="font-weight:normal;">Select Order Type</h2>
                <select name="Order_Status" id="" class="form-control" style="max-width:70%">
                        <option value="" disabled selected>Select your option</option>
                        <option value="Order Placed">Order Placed</option>
                        <option value="Order Dispatched">Order Dispatched</option>
                        <option value="Order Complete">Order Complete</option>       
                </select>
                <input type="submit" name="search" class="btn btn-primary btn-lg " value="Search">
            </div>
          </form>
        </h1>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead>
              <tr>
                   <th>S.N</th>
                   <th>Order Id</th>
                   <th>Amount</th>
                   <th>Transaction Id</th>
                   <th>Order Date</th>
                   <th>Status</th>
                   <th>Update</th>
              </tr>
            </thead>
            <tbody>
                <?php order_status(); ?>
            </tbody>
        </table>
    </div>
</div>