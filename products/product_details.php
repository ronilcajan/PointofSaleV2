<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
    $product_no = $_GET['product_no'];
    $sql = "SELECT * FROM products where product_no='$product_no'";
    $res = $conn->query($sql);
    $products = array();
    $row = $res->fetch_assoc();
    $products[] = $row; 
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Product Details · POS.PHP</title>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed" >
        <div class="wrapper">
        <!-- Navbar -->
            <!-- Main Topbar Container -->
            <?php include '../templates/topnavbar.php'; ?>
            <!-- Main Sidebar Container -->
            <?php include '../templates/sidenavbar.php'; ?>
            <!-- /sidebar -->
        <!-- /navbar -->
        

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Product Details</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Product Details</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-solid">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h3 class="d-inline-block d-sm-none"><?php echo $products[0]['name'];?></h3>
                                    <div class="col-12">
                                        <img src="../uploads/products/<?php echo $products[0]['product_image'];?>" class="product-image img-thumbnail" alt="Product Image">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <h3 class="my-3"><?php echo $products[0]['name'];?></h3>
                                    <p><?php echo $products[0]['description'];?></p>

                                    <hr>

                                    <div class="bg-gray py-2 px-3 mt-4">
                                        <h2 class="mb-0">
                                          Php <?php echo number_format($products[0]['sell_price']);?>
                                        </h2>
                                       <!--  <h4 class="mt-0">
                                          <small>Ex Tax: $80.00 </small>
                                        </h4> -->
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <nav class="w-100">
                                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Product Sold</a>
                                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">More Product Details</a>
                                    </div>
                                </nav>
                                <div class="tab-content p-3 w-100" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> 
                                        <table id="products_table" class="table table-bordered table-striped ">
                                            <thead>
                                                <tr>
                                                    <th>Receipt No.</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Receipt No.</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Unit</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                                        <strong><i class="fas fa-box mr-1"></i> Stocks left:</strong>
                                        <p class="text-muted">
                                            <?php echo $products[0]['stocks'];?>
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-xe4 mr-1"></i> Unit</strong>
                                        <p class="text-muted">
                                            <?php echo $products[0]['unit'];?>
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-inbox mr-1"></i> Minimum Stocks</strong>
                                        <p class="text-muted">
                                            <?php echo $products[0]['min_stocks'];?>
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-sticky-note mr-1"></i> Remarks</strong>
                                        <p class="text-muted">
                                            <?php echo $products[0]['remarks'];?>
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-thumbtack mr-1"></i> Location</strong>
                                        <p class="text-muted">
                                            <?php echo $products[0]['location'];?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->

                    </section>
                    <!-- /.content -->
                  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
        <?php include '../templates/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include '../templates/footer-links.php'; ?>
</body>
</html>