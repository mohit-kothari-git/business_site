<?php require_once("config.php")?>
<?php 
//function to add function to cart and limit till quantity available in the database
  if(isset($_GET['add']))
  {
    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']). " ");
    confirm($query);
    while($row = fetch_array($query))
    {
      if($row['product_quantity']!=$_SESSION['product_' . $_GET['add']])
      {
        $_SESSION['product_' . $_GET['add']]+=1; 
        redirect("../public/checkout.php");
      }
      else
      {
        set_message($row['product_title'] . " Quantity Limit Reached !!!");
        redirect("../public/checkout.php");
      }
    }
    //$_SESSION['product_' . $_GET['add']] +=1;
    //redirect("index.php");
  }
  //item remove from cart function
  if(isset($_GET['remove']))
  {
    $_SESSION['product_' . $_GET['remove']]--;

    if($_SESSION['product_' . $_GET['remove']] < 1)
    {
      unset($_SESSION['item_total']);
      unset($_SESSION['item_quantity']);
      redirect("../public/checkout.php");
    }
    else
    {
      redirect("../public/checkout.php");
    }
  }
//Item Delete from cart Function
  if(isset($_GET['delete']))
  {
    $_SESSION['product_' . $_GET['delete']] = '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);

    redirect("../public/checkout.php");

  }

//function to display cart
function cart_display()
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
<td><a class='btn btn-success' href="../resources/cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus'></span></a> <a class='btn btn-warning' href="../resources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus'></span></a> <a class='btn btn-danger' href="../resources/cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
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
//function for reports page cart details
function process_transaction()
{
  if ($_SESSION['item_total']!=0) {
  # code...
  $amount= $_SESSION['item_total'];
  $tran_id = uniqid(date('d-m-Y'));
  $total = 0;
  $item_quantity = 0;
  $date = date('d-m-Y h:i:s a', time());
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
    echo "Your Transaction Id Is " . $tran_id . " And Amount Is " . $amount;
    //to insert into orders table
    $send_order = query("INSERT INTO orders (order_amount,tran_id,order_date) VALUES('{$amount}','{$tran_id}','{$date}')");
    $last_id = last_id();
    confirm($send_order);
    //to select data of a particular product based on product_id to process & insert it into reports column
    $query = query("SELECT * FROM products WHERE product_id = ". escape_string($id). " ");
confirm($query);
while($row = fetch_array($query))
{
  // for calculating subtotal
  $sub = $row['product_price']*$value;
  //calculating quantity
  $item_quantity +=$value;
  $product_price = $row['product_price'];
  $product_title = $row['product_title'];
  //to put data into the reports table 
  $insert_report = query("INSERT INTO reports (product_id,order_id,product_price,product_quantity,product_title) VALUES('{$id}','{$last_id}','{$product_price}','{$value}','{$product_title}')");
  confirm($insert_report);
}
$total += $sub;
$item_quantity;
  }
}
}
session_destroy();
}else
redirect("checkout.php");
}
?>