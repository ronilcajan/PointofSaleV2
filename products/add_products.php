<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Products Overview · POS.PHP</title>
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Products</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card mb-5">
                        <div class="card-header">
                            <h3 class="card-title">Add or Edit Products</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                             <form method="POST" action="" enctype="multipart/form-data" id="product_form">
                            <input type="hidden" name="size" value="1000000">
                            <div class="form-group">
                                <label for="inputText">Serial No.</label>
                                <div class="input-group col-sm-6">
                                    <?php if(!isset($_GET['product_no'])):?>
                                    <input type="text" class="form-control rounded-1 serial" id="inputText" placeholder="Enter product serial number/barcode..." name="product_no" autofocus required>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-flat serial_search"><i class="fa fa-search"></i></button>
                                    </span>
                                    <?php else: ?>
                                    <input type="text" class="form-control rounded-1 serial" id="inputTextserial" placeholder="Enter product serial number/barcode..." name="product_no" value="<?php echo $_GET['product_no'];?>" autofocus required>
                                    <span class="input-group-append">
                                        <button type="button" class="btn btn-info btn-flat serial_search"><i class="fa fa-search"></i></button>
                                    </span>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputText">Title</label>
                                <input type="text" class="form-control name" id="inputText" name="name" placeholder="Enter product name..." required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control description" rows="3" name="description" placeholder="Enter product description..." required></textarea>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <label for="inputText">Price</label>
                                    <input type="number" min="0.25" step="0.25" class="form-control price" name="price" id="inputText" placeholder="Enter product price..." required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="inputText">Stocks</label>
                                    <input type="number" min="1" class="form-control stocks" name="stocks" id="inputText" placeholder="Enter product stocks..." required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="inputText">Unit</label>
                                    <input type="text" class="form-control unit" name="unit" id="inputText" placeholder="Enter product unit..." required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="inputText">Minimum Stocks</label>
                                    <input type="number" min="1" class="form-control min_stocks" name="min_stocks" id="inputText" placeholder="Enter minimun stocks..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputText">Remarks</label>
                                <input type="text" class="form-control remarks" name="remarks" id="inputText" placeholder="Enter product remarks..." required>
                            </div>
                            <div class="form-group">
                                <label for="inputText">Location</label>
                                <input type="text" class="form-control location" name="location" id="inputText" placeholder="Enter product location..." required>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="inputText">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" onchange="productloadFile(event)" name="product_img" required>
                                        <label class="custom-file-label" for="exampleInputFile">Choose product image...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputText">Image Preview</label>
                                <div class="img-pr">
                                    <img class="img-fluid img-thumbnail img-preview" width="150" height="150" src="../assets/images/product-preview.png" alt="product image preview" id="product_output"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button class="btn btn-success create-products" type="Submit"><i class="fa fa-check"></i> Submit</button>
                        </div>
                            </form>
                    </div>
                    <!-- /.card -->
  
                </div><!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include '../templates/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include '../templates/footer-links.php'; ?>
    <script src="../assets/scripts/product.js"></script>
    </body>
</html>