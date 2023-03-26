<?php require_once("../resources/config.php")?>
<?php include(TEMPLATE_FRONT . DS ."header.php")?>
<div class="container">
<h1>Thank You For Shopping At Mohith Marketing</h1>
<h3>
<?php
	//echo $tran_id; 
?>
	
</h3>
</div>
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
          <?php thankyou_display(); ?>
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
  process_transaction();
  //echo "Your Transaction Id Is " . $tran_id . " And Amount Is " . $amount;
 ?>
 <br>
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
            
<div class="col-xs-4 pull-center ">
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
<?php 
//function to display cart
function thankyou_display()
{
  $total = 0;
  $item_quantity = 0;
  //for performig the checkout page for each session where value is the number of items name is product title
  foreach ($_SESSION as $name => $value) 
  { 
    //if($_SESSION['item_quantity']==0) 
    //{
      //echo "cart Empty";
    //}
    if($value > 0)
    {
  if(substr($name,0,8 ) == "product_")
  {
     // $length = strlen($name-8);
  //$id = substr($name, 8 , $length);
    //to remove integer content from the Product_1 which is comming from ge request as $name where 7 is the product id so to extract that its used substr will not work in php 7  
    $id = preg_replace('/[^0-9]/', '', $name);
    $query = query("SELECT * FROM products WHERE product_id = ". escape_string($id). " ");
confirm($query);
while($row = fetch_array($query))
{
  // for calculating subtotal
  $sub = $row['product_price']*$value;
  //calculating quantity
  $item_quantity +=$value;
  //for displaying in html content
$product = <<<DELIMITER
<tr>
<td>{$row['product_title']}</td> 
<td>&#8377;{$row['product_price']}</td>
<td>{$value}</td>
<td>&#8377;$sub</td>
</tr>
DELIMITER;
echo $product;

}
$_SESSION['item_total'] = $total += $sub;
$_SESSION['item_quantity'] = $item_quantity;
  }
}
}
}
?>
<?php include(TEMPLATE_FRONT . DS ."footer.php")?>