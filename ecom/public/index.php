<?php require_once("../resources/config.php")?>
<?php include(TEMPLATE_FRONT . DS ."header.php")?>
    <!-- Page Content -->
<div class="container">

    <div class="row">

       <?php include(TEMPLATE_FRONT . DS ."side_nav.php")?>

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    
                    <?php include(TEMPLATE_FRONT . DS ."slider.php")?>
                </div>

            </div>
<!-- Starting Products Display -->
            <div class="row">
                <?php 
                if (isset($_POST['search'])) {
                    # code...
                    search_results();
                }else {
                    # code...
                    get_products();
                }

                 ?>

            </div><!-- Row for products Ending -->

        </div>

    </div>
<!-- /.container -->
<?php include(TEMPLATE_FRONT . DS ."footer.php")?>
   