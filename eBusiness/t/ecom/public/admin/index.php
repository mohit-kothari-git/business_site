<?php require_once("../../resources/config.php")?>
<?php include(TEMPLATE_BACK . DS ."header.php")?>
<?php if(!isset($_SESSION['username']))
        {
            redirect("../../public");
        } 
?>
<div id="page-wrapper">
    <div class="container-fluid">

        <!-- /.row -->
        <?php
        if ($_SERVER['REQUEST_URI'] == "/Mohith-Marketing/ecom/public/admin/" || $_SERVER['REQUEST_URI'] == "/Mohith-Marketing/ecom/public/admin/index.php") {
            include(TEMPLATE_BACK . DS . "admin_content.php");
        }
        if (isset($_GET['orders'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/orders.php");
        }elseif (isset($_GET['products'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/products.php");
        }elseif (isset($_GET['edit_products'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/edit_products.php");
        }elseif (isset($_GET['add_product'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/add_product.php");
        }elseif (isset($_GET['categories'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/categories.php");
        }elseif (isset($_GET['users'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/users.php");
        }elseif (isset($_GET['add_user'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/add_user.php");
        }elseif (isset($_GET['reports'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/reports.php");
        }elseif (isset($_GET['delete_order_id'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/delete_order.php");
        }elseif (isset($_GET['delete_product_id'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/delete_product.php");
        }elseif (isset($_GET['delete_category_id'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/delete_category.php");
        }elseif (isset($_GET['delete_report_id'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/delete_report.php");
        }elseif (isset($_GET['delete_users_id'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/delete_users.php");
        }elseif (isset($_GET['slides'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/slides.php");
        }
        elseif (isset($_GET['delete_slide_id'])) {
            # code...
            include(TEMPLATE_BACK . DS . "/delete_slide.php");
        }
        ?>
    </div>
    <!-- /.container-fluid -->
<?php include(TEMPLATE_BACK . DS ."footer.php")?>