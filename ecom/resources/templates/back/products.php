 <div class="row">
    <h1 class="page-header">
       All Products
    </h1>
    <h3 class="bg-success"><?php display_message(); ?></h3>
    <table class="table table-hover">
        <thead>

          <tr> <th>Sl.no</th>
               <th>Id</th>
               <th>Title</th>
               <th>Product Image</th>
               <th>Category Id</th>
               <th>Category</th>
               <th>Price</th>
               <th>Quantity Available</th>
          </tr>
        </thead>
        <tbody> 
            <?php display_products_in_admin(); ?>
        </tbody>
    </table>
</div>