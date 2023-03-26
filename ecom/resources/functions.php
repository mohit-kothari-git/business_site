<?php
$upload_directory = "uploads";
// helper Funtions Start
//fuction to get the last id (mainly used in this Project to get the orderid from the orders)
function last_id()
{
	global $connection;
	return mysqli_insert_id($connection);
}
//set message funtion 
function set_message($msg)
{
	if(!empty($msg))
	{
		$_SESSION['message'] = $msg;
	}
	else
	{
		$msg = "";
	}
}
//display Message Funtion
function display_message()
{
	if(isset($_SESSION['message']))
	{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}
//redirecting funtion
function redirect($location)
{

	header("Location: $location");
}
//to shortern the sql query line 
//$send_query = mysqli_query($connection,$query);
//it will do this type of query
function query($sql)
{
	global $connection;
	
	return mysqli_query($connection, $sql);
}
//To display error message if there is error in returing values from the database
function confirm($result)
{
	global $connection;
	if(!$result)
	{
		die("QUERY FAILED" . mysqli_error($connection));
	} 
}
// To Prevent Mysqli Injections
function escape_string($string)
{
	global $connection;
	return mysqli_real_escape_string($connection,$string);
}
//for result array
function fetch_array($result)
{
	return mysqli_fetch_array($result); 	 
}
//helper funtions end
/**********************************Front end Funtions ***************************************/
//get products and display them
function get_products() 
{

	$query = query(" SELECT * FROM products WHERE product_quantity >= 1");
	confirm($query);
	$rows = mysqli_num_rows($query);
	
	if(isset($_GET['page']))
	{
		$page = preg_replace('#[^0-9]#', '', $_GET['page']);

	}else{
		$page = 1;
	}

	$perPage = 6;
	$lastPage = ceil($rows/$perPage);

	if($page < 1)
	{
		$page = 1;
	}elseif ($page > $lastPage) {
		# code...
		$page = $lastPage;
	}

	$middleNumbers = '';

	$sub1 = $page -1;
	$sub2 = $page -2;
	$add1 = $page +1;
	$add2 = $page +2;

	if($page == 1)
	{
		$middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';

		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
		/*echo "<ul class ='pagination'>{$middleNumbers}</ul>";*/

	}elseif ($page == $lastPage) {
		# code...
		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';

		$middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>'; 
		/*echo "<ul class ='pagination'>{$middleNumbers}</ul>";*/

	}elseif ($page > 2 && $page < ($lastPage -1)) {
		# code...
		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub2.'">' .$sub2. '</a></li>';

		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
		


		$middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
		

		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
		
		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add2.'">' .$add2. '</a></li>';

		// echo "<ul class ='pagination'>{$middleNumbers}</ul>";
	}elseif ($page > 1 && $page < $lastPage)
	{
		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$sub1.'">' .$sub1. '</a></li>';
		


		$middleNumbers .= '<li class="page-item active"><a>' .$page. '</a></li>';
		

		$middleNumbers .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$add1.'">' .$add1. '</a></li>';
		
		/*echo "<ul class ='pagination'>{$middleNumbers}</ul>";*/
	}


	$limit = 'LIMIT ' . ($page-1) * $perPage . ',' . $perPage;
/*	echo $limit;*/

	$query2 = query(" SELECT * FROM products WHERE product_quantity >= 1 $limit");
	confirm($query2);

	$outPagination = "";

	if ($lastPage != 1) {
		# code...
		$count = "Page $page of $lastPage";
	}

	if ($page != 1) {
		# code...
		$prev = $page - 1;
		$outPagination .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$prev.'">Back</a></li>';
	}

	$outPagination .= $middleNumbers;

	if ($page != $lastPage)
	{
		$next = $page + 1;
		$outPagination .= '<li class="page-item"><a class="page-link" href="'.$_SERVER['PHP_SELF'].'?page='.$next.'">Next</a></li>';

	}


	while($row = fetch_array($query2)) 
	{
		$product_image = display_image_loc($row['product_image']);
		$product = <<<DELIMITER

	        <div class="col-sm-4 col-lg-4 col-md-4">
	            <div class="thumbnail">
	                <a target="_blank" href=item.php?id={$row['product_id']}><img style="height:115px" src="../resources/{$product_image}" alt="Image Not Found" onerror="this.onerror=null;this.src='https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !';"></a>
	                <div class="caption">
	                    <h4 class="pull-right">&#8377;{$row['product_price']}</h4>
	                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
	                    </h4>
	                    <p style="height:90px">{$row['short_desc']}</p>
	                    <a class="btn btn-primary"href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a>
	                </div>
	                
	            </div>
	        </div>
DELIMITER;
		echo $product;
	}

	echo "<div style='clear:both' class = 'text-center'><ul class ='pagination'>{$outPagination}</ul></div>";
	echo "<ul style='clear:both' class = 'text-center'><a>$count</a></ul></div>";

}
//function to get products Based on category Selected
function getcat_produts()
{
$query=query("SELECT * FROM products WHERE product_category_id=" . escape_string($_GET['id']). " AND product_quantity >= 1");
confirm($query);
while($row = fetch_array($query))
{
	$product_image = display_image_loc($row['product_image']);
$product = <<<DELIMITER

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="../resources/{$product_image}" style="height:115px" alt="Image Not Found" onerror="this.onerror=null;this.src='https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !';">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>{$row['short_desc']}</p>
                        <p>
                        <a class="btn btn-primary"href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a> 
                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMITER;
			echo $product;
}   
 }
//funtion to get side nav dynamic
function get_categories()
{
	$query = query("SELECT * FROM categories");
	confirm($query);
	while($row = fetch_array($query))
	{
	$categories_links = <<<DELIMITER
	<a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMITER;
echo $categories_links;
	}
}
//shop
function get_products_in_shop_page()
{
$query=query("SELECT * FROM products WHERE product_quantity >= 1 LIMIT 20 ");
confirm($query);
while($row = fetch_array($query))
{
	$product_image = display_image_loc($row['product_image']);
$product = <<<DELIMITER

            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img style="height:115px" src="../resources/{$product_image}" alt="Image Not Found" onerror="this.onerror=null;this.src='https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !';">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p  style="height:90px">{$row['short_desc']}</p>
                        <p>
                        <a class="btn btn-primary"href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a> 
                        <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMITER;
			echo $product;
}   
 }

//Login Function 
function user_login()
{
	if(isset($_POST['submit']))
	{
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);
		$query = query("SELECT * FROM users  WHERE username = '{$username}' AND password = '{$password}'");
		confirm($query);
		$querys = query("SELECT * FROM admins  WHERE username = '{$username}' AND password = '{$password}'");
		confirm($querys);
		if(mysqli_num_rows($query)>0)
		{
			$_SESSION['username'] = $username;
			redirect("index.php");
		}elseif (mysqli_num_rows($querys)>0) {
			# code...
			$_SESSION['username'] = $username;
			redirect("admin");
		}
		else
		{
			set_message("Username/Password Incorrect");
			redirect("login.php");
		}
	}
}

function send_message()
{
	if(isset($_POST['submit']))
	{
		$to = "mohitkothari324@gmail.com";
		$form_name = $_POST['name'];
		$form_email = $_POST['email'];
		$form_contat = $_POST['contact_number'];
		$form_subject = $_POST['subject'];
		$form_message = $_POST['message'];
		$header = "From: {$form_name} {$form_email}"; 
		$result  = mail($to, $form_subject, $form_message, $header);
		if(!$result)
		{	set_message("Your message is not sent !!");
			redirect("contact.php");
		}
		else
		{
			set_message("Your message has been sent");
			redirect("contact.php");  
		}

	}
}
//For Registration Page
function user_register()
{
	if(isset($_POST['register']))
	{
		$username            = escape_string($_POST['username']);
		$customername        = escape_string($_POST['custname']);
		$password            = escape_string($_POST['psw']);
		$contact             = escape_string($_POST['contact']);
		$email               = escape_string($_POST['email']);
		$address             = escape_string($_POST['address']);
		$image               = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);
		$uploaddir           = '../resources/uploads/';
		$uploadfile          = $uploaddir . basename($_FILES["file"]['name']);

		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

		$query = query("INSERT INTO users_meta(username, custname, password, contact, email, address,image) VALUES('{$username}','{$customername}','{$password}','{$contact}','{$email}','{$address}','{$image}')");
		confirm($query);
		$query2 = query("INSERT INTO users(username,password,email,user_image) VALUES ('{$username}','{$password}','{$email}','{$image}')");
		confirm($query2);	
		set_message("{$username} Registration Sucessfull !!!");
		redirect("login.php");
	}
}
/****************************************Back End Functions***********************************/
//funtion to display orders in admin section   
function display_orders()
{
	$query = query("SELECT * FROM orders");
	confirm($query);
	$sl_no = 0;
	while($row = fetch_array($query))
	{	
		$sl_no++;
		$orders = <<<DELIMITER
		<tr>
		<td>{$sl_no}</td>
		<td>{$row['order_id']}</td>
        <td>{$row['order_amount']}</td>
        <td>{$row['tran_id']}</td>
        <td>{$row['order_date']}</td>
        <td>{$row['Status']}</td>
        <td><a class='btn btn-danger' href="index.php?delete_order_id={$row['order_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
        </tr>
DELIMITER;
		echo $orders;
	}
}
// function to display products in admin section
function display_image_loc($picture)
{
	global $upload_directory;
	return $upload_directory . DS . $picture;
}
function display_products_in_admin()
{
	$query = query("SELECT * FROM products");
	confirm($query);
	$sl_no = 0;
	while($row = fetch_array($query))
	{	
		$sl_no++;
		$category = display_categories_in_view_products($row['product_category_id']);
		$product_image = display_image_loc($row['product_image']);
		$products_admin = <<<DELIMITER
		<tr>
		<td>{$sl_no}</td>
		<td>{$row['product_id']}</td>
		<td><a href="index.php?edit_products&id={$row['product_id']}">{$row['product_title']}</a></td>
<td><img width = "150" height = '100' src="../../resources/{$product_image}" alt="Image Not Found" onerror="this.onerror=null;this.src='https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !';"></td>
<td>{$row['product_category_id']}</td>
<td>{$category}</td>
<td>&#8377;{$row['product_price']}</td>
<td>{$row['product_quantity']}</td>
<td><a class='btn btn-danger' href="index.php?delete_product_id={$row['product_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
</tr>
DELIMITER;
echo $products_admin;
		
	}
}
// to display product category in view products section
function display_categories_in_view_products($product_category_id)
{
	$category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
	confirm($category_query);
	while($category_row = fetch_array($category_query))
	{
		return $category_row['cat_title'];
	}
}
//Adding Products in Admin
function add_product()
{
	if(isset($_POST['publish']))
	{
		$product_title       = escape_string($_POST['product_title']);
		$product_category_id = escape_string($_POST['product_category_id']);
		$product_price       = escape_string($_POST['product_price']);
		$product_description = escape_string($_POST['product_description']);
		$short_desc          = escape_string($_POST['short_desc']);
		$product_quantity    = escape_string($_POST['product_quantity']);
		$product_image       = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);
		$uploaddir = '../../resources/uploads/';
		$uploadfile = $uploaddir . basename($_FILES["file"]['name']);

		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
		
		/*f(move_uploaded_file($image_temp_location,$uploadfile);*/
		//move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);
		$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}','{$product_category_id}','{$product_price}','{$product_description}','{$short_desc}','{$product_quantity}','{$product_image}')");
		$last_id = last_id();
		$fetch_title = query("SELECT * FROM products WHERE product_id = '{$last_id}'");
		while($row = fetch_array($fetch_title))
		{
			$new_title = $row['product_title'];
		}
		confirm($query);
		set_message("New Item {$new_title} Added With Product Id {$last_id} !!!");
		redirect("index.php?products");
	}
}
//to show categories in add product page
function show_categories()
{
	$query = query("SELECT * FROM categories");
	confirm($query);
	while($row = fetch_array($query))
	{
	$categories_options = <<<DELIMITER
	<option value="{$row['cat_id']}">{$row['cat_title']}</option>
DELIMITER;
echo $categories_options;
	}
}
/*For Edit Products Page in admin*/
function update_product()
{
	if(isset($_POST['update']))
	{	
		$product_title       = escape_string($_POST['product_title']);
		$product_category_id = escape_string($_POST['product_category_id']);
		$product_price       = escape_string($_POST['product_price']);
		$product_description = escape_string($_POST['product_description']);
		$short_desc          = escape_string($_POST['short_desc']);
		$product_quantity    = escape_string($_POST['product_quantity']);
		$product_image       = escape_string($_FILES['file']['name']);
		$image_temp_location = escape_string($_FILES['file']['tmp_name']);
		$uploaddir = '../../resources/uploads/';
		$uploadfile = $uploaddir . basename($_FILES["file"]['name']);

		if (empty($product_image)) {
			# code...
			$get_pic = query("SELECT product_image FROM products WHERE product_id =" .escape_string($_GET['id']). "");
			confirm($get_pic);
			while($pic = fetch_array($get_pic))
			{
				$product_image = $pic['product_image'];
			}
		}
		//php function to upload file parameters source/destination
		move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
		//query for updating products
		$query = "UPDATE products SET ";
		$query .= "product_title       = '{$product_title}', ";
		$query .= "product_category_id = '{$product_category_id}', ";
		$query .= "product_price       = '{$product_price}', ";
		$query .= "product_description = '{$product_description}', ";
		$query .= "short_desc          = '{$short_desc}', ";
		$query .= "product_quantity    = '{$product_quantity}', ";
		$query .= "product_image       = '{$product_image}' ";
		$query .= "WHERE product_id=" . escape_string($_GET['id']);
		$send_update_query = query($query);
		confirm($send_update_query);
		set_message("{$product_title} With Product Id {$_GET['id']} Has Been Updated !!! ");
		redirect("index.php?products");
	}
}
/***********************Categories Page Admin Block*****************************/
function show_categories_in_admin()
{
	$query = "SELECT * FROM categories";
	$category_query = query($query);
	confirm($category_query);
	while($row = fetch_array($category_query))
	{
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
			$category = <<<DELIMITER
			<tr>
			    <td>{$cat_id}</td>
			    <td>{$cat_title}</td>
			    <td><a class='btn btn-danger' href="index.php?delete_category_id={$row['cat_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
			</tr>
DELIMITER;
echo $category;
	}
}

function add_category()
{
	if(isset($_POST['add_category']))
	{
		$cat_title = escape_string($_POST['cat_title']);
		if($cat_title == "" || $cat_title == null)
		{
			set_message("Field cannot be Blank !!!");
		}else
		{
		$insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
		confirm($insert_cat);
				set_message("New Category {$cat_title} Added");
			//redirect("index.php?categories");
		}
	}
}

/*******************************Admin Users*****************************************/
function show_users_in_admin()
{
	$query = "SELECT * FROM users";
	$category_query = query($query);
	confirm($category_query);
	while($row = fetch_array($category_query))
	{
		$user_id = $row['user_id'];
		$user_name = $row['username'];
		$user_mail = $row['email'];
		$user_password = $row['password'];
			$user = <<<DELIMITER
			<tr>
			    <td>{$user_id}</td>
			    <td>{$user_name}</td>
			    <td>{$user_mail}</td>
			    <td>{$user_password}</td>
			    <td><a class='btn btn-danger' href="index.php?delete_users_id={$row['user_id']}"><span class='glyphicon glyphicon-remove'></span></a></td>
			</tr>
DELIMITER;
echo $user;
	}
}
function add_user() {


if(isset($_POST['add_user'])) {


$username   = escape_string($_POST['username']);
$email      = escape_string($_POST['email']);
$password   = escape_string($_POST['password']);
$user_photo = escape_string($_FILES['file']['name']);
$photo_temp = escape_string($_FILES['file']['tmp_name']);
$uploaddir = '../../resources/uploads/';
$uploadfile = $uploaddir . basename($_FILES["file"]['name']);

if (empty($user_photo)) {
	# code...
	$get_pic = query("SELECT user_image FROM users WHERE user_id =" .escape_string($_GET['id']). "");
	confirm($get_pic);
	while($pic = fetch_array($get_pic))
	{
		$user_image = $pic['user_image'];
	}
}
//php function to upload file parameters source/destination
move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);

// move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);


$query = query("INSERT INTO users(username,email,password,user_image) VALUES('{$username}','{$email}','{$password}','{$user_photo}')");
confirm($query);

set_message("USER CREATED !!!");

redirect("index.php?users");



}



}
/****************************REPORTS PAGE*********************************/
function get_reports(){


$query = query(" SELECT * FROM reports");
confirm($query);

while($row = fetch_array($query)) {


$report = <<<DELIMETER

        <tr>
             <td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
            <td>{$row['order_id']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_title']}
            <td>{$row['product_quantity']}</td>
            <td><a class="btn btn-danger" href="index.php?delete_report_id={$row['report_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
        </tr>

DELIMETER;

echo $report;


        }
}
/**************************************SLIDES FUNCTION***********************************/
function get_slides()
{
	$query = query("SELECT * FROM slides");
	confirm($query);
	while($row = fetch_array($query))
	{
		$slide_image = display_image_loc($row['slide_image']);
		$slides = <<<DELIMETER
		<div class="item">
		    <img class="slide-image" src="../resources/{$slide_image}" alt="">
		</div>
DELIMETER;
echo $slides;
	}
}
function get_active_slide()
{
	$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
	confirm($query);
	while($row = fetch_array($query))
	{
		$slide_image = display_image_loc($row['slide_image']);
		$slide_active = <<<DELIMETER
		<div class="item active">
		    <img class="slide-image" src="../resources/{$slide_image}" alt="">
		</div>
DELIMETER;
echo $slide_active;
	}
}
function get_slide_thumbnails()
{
	 $query = query("SELECT * FROM slides ORDER BY slide_id ASC ");
	confirm($query);
	while($row = fetch_array($query))
	{
		$slide_image = display_image_loc($row['slide_image']);
		$slide_thumb_admin = <<<DELIMETER
		    <div class="col-xs-6 col-xs-3 image_container">
		      	<a href="index.php?delete_slide_id={$row['slide_id']}">
		      	<img class="img-responsive" src="../../resources/{$slide_image}" alt="">
		      	</a>
		      	<div class="caption">
		      	<p>{$row['slide_title']}</p>
		      	</div>
		      </div> 	
DELIMETER;
echo $slide_thumb_admin;
	}
}
function add_slides()
{
	if(isset($_POST['add_slide']))
	{
		$slide_title = escape_string($_POST['slide_title']);
		$slide_image = escape_string($_FILES['file']['name']);
		$slide_image_location = escape_string($_FILES['file']['tmp_name']);
		$uploaddirr = '../../resources/uploads/';
		$uploadfiles = $uploaddirr . basename($_FILES["file"]['name']);
		move_uploaded_file($_FILES['file']['tmp_name'],$uploadfiles);
		if(empty($slide_title) || empty($slide_image))
		{
			echo "<p class = 'bg-danger'>This Field Cannot Be Empty</p>";
		}else{
			move_uploaded_file($slide_image_location,$uploadfiles);
			$query = query("INSERT INTO slides(slide_title, slide_image) VALUES('{$slide_title}','{$slide_image}')");
			confirm($query);
			redirect("index.php?slides");
			set_message("Slide Added");
			
		}
	}
}
function get_current_slide_in_admin()
{
	$query = query("SELECT * FROM slides ORDER BY slide_id DESC LIMIT 1");
	confirm($query);
	while($row = fetch_array($query))
	{
		$slide_image = display_image_loc($row['slide_image']);
		$slide_active_admin = <<<DELIMETER
		    <img class="img-responsive thumb_image " src="../../resources/{$slide_image}" alt="">
DELIMETER;
echo $slide_active_admin;
	}
}
function search_results()
{	
	$search = escape_string($_POST['search']);
	$query = query("SELECT * FROM products where product_title LIKE '%{$search}%'");
	confirm($query);
		while($row = fetch_array($query)) 
		{
			$product_image = display_image_loc($row['product_image']);
			$product = <<<DELIMITER

		        <div class="col-sm-4 col-lg-4 col-md-4">
		            <div class="thumbnail">
		                <a target="_blank" href=item.php?id={$row['product_id']}><img style="height:115px" src="../resources/{$product_image}" alt="Image Not Found" onerror="this.onerror=null;this.src='https://place-hold.it/320x150/3ec1d5?text=This Is A Replacement Image By Mohit !';"></a>
		                <div class="caption">
		                    <h4 class="pull-right">&#8377;{$row['product_price']}</h4>
		                    <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
		                    </h4>
		                    <p style="height:90px">{$row['short_desc']}</p>
		                    <a class="btn btn-primary"href="../resources/cart.php?add={$row['product_id']}">Add to Cart</a>
		                </div>
		                
		            </div>
		        </div>
DELIMITER;
			echo $product;
		}

}
function order_status()
{
	if (isset($_POST['search']))
	{
		$order_stat = $_POST['Order_Status'];
			$query = query("SELECT * FROM orders WHERE Status='{$order_stat}'");
			confirm($query);
			$sl_no = 0;
			while($row = fetch_array($query))
			{	
				$sl_no++;
				$orders = <<<DELIMITER
				<tr>
				<td>{$sl_no}</td>
				<td>{$row['order_id']}</td>
		        <td>{$row['order_amount']}</td>
		        <td>{$row['tran_id']}</td>
		        <td>{$row['order_date']}</td>
		        <td>{$row['Status']}</td>
		        <td><a class='btn btn-warning' href="index.php?update_order_id={$row['order_id']}"><span class='glyphicon glyphicon-edit'></span></a></td>
		        </tr>
DELIMITER;
				echo $orders;
			}
	}	
}
?>