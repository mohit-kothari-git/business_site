<?php require_once("../resources/config.php")?>
<?php include(TEMPLATE_FRONT . DS ."header.php")?>
    <!-- Page Content -->
    <div class="container">
<!-- /.row --> 

<div class="row">
  <h4 class="text-center bg-danger"><?php display_message(); ?></h4>  
      <h1>Checkout</h1>

<form action="">
    <table class="table table-striped">
        <thead>
          <tr>
           <th>Product</th>
           <th>Price</th>
           <th>Quantity</th>
           <th>Sub-total</th>
     
          </tr>
        </thead>
        <tbody>
          <?php cart_display(); ?>
        </tbody>
        <!--<?php 
        //if ($_SESSION['item_quantity']==0) {
  //echo "cart Empty";
//}
?>-->
    </table>
</form>
<form>
<?php
//?tx={$_SESSION['item_total']}
$link = "thank_you.php";
if(isset($_SESSION['item_quantity']) && $_SESSION['item_quantity']>=1)
{
  $buy_now_botton = <<<DELIMITER
  <a class="btn btn-primary" href="thank_you.php">Buy Now</a>
DELIMITER;
echo $buy_now_botton;
}
?>

</form>
 <br>
<!--h3><a href="thank_you.php?tx=1">Buy Now</a></h3>-->
<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
<h2>Cart Totals</h2>

<table class="table table-bordered" cellspacing="0">

<tr class="cart-subtotal">
<th>Items:</th>
<td><span class="amount">
<?php echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
 ?>
 </span></td>
</tr>
<tr class="shipping">
<th>Shipping and Handling</th>
<td>Free Shipping</td>
</tr>

<tr class="order-total">
<th>Order Total</th>
<td><strong><span class="amount">&#8377;<?php 
echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
 ?></span></strong> </td>
</tr>


</tbody>

</table>

</div>
<!-- CART TOTALS-->


 </div><!--Main Content-->
</div><!--Container-->

<?php include(TEMPLATE_FRONT . DS ."footer.php")?>