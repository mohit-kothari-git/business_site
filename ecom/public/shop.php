<?php require_once("../resources/config.php")?>
<?php include(TEMPLATE_FRONT . DS ."header.php")?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron hero-spacer">
            <h1>A Warm Welcome!</h1>
            <p>Mohith Marketing deals in various Product Line Ups and Services such as Mobile Accesories,CCTV Solutions,Security Systems,Computer Perhiperals,And Networking Components.All this for all Base of Customers From Home Purpose To Wholesale Vendors,Contracts,& Companies.We maintain and repair your mobiles, computers, laptops, networks and servers.Our solutions are enginnered for excellent value for money and use.</p>
            <p><a class="btn btn-primary btn-large">Call to action!</a>
            </p>
        </header>

        <hr>

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h3>Latest Products</h3>
            </div>
        </div>
        <!-- /.row -->

        <!-- Page Features -->
        <div class="row text-center">
        <?php get_products_in_shop_page(); ?>
        </div>
        <!--  /.row -->
</div>   
        <!-- Footer -->
<?php include(TEMPLATE_FRONT . DS ."footer.php")?>
