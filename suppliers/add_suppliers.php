<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Suppliers Overview · POS.PHP</title>
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
                            <h1 class="m-0 text-dark">Suppliers</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Suppliers</li>
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
                            <h3 class="card-title">Suppliers Personal Information</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="" enctype="multipart/form-data" id="supplier_form">
                            <input type="hidden" name="size" value="1000000">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputText">Company Name</label>
                                    <input type="text" class="form-control cname" id="inputText" name="cname" placeholder="Enter company name..." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control address" rows="3" name="address" placeholder="Enter customer address..." required></textarea>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="inputText">Email Address</label>
                                    <input type="email" class="form-control email" id="inputText" name="email" placeholder="Enter email address..." required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="inputText">Contact Number</label>
                                    <input type="number" class="form-control number" id="inputText" name="number" placeholder="Enter contact number..." required>
                                </div>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="inputText">Upload Profile</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" onchange="supplierloadFile(event)" name="company_img">
                                        <label class="custom-file-label" for="exampleInputFile">Choose customer image...</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputText">Profile Preview</label>
                                <div class="img-pr">
                                    <img class="img-fluid img-thumbnail img-preview" width="150" height="150" src="../assets/images/product-preview.png" alt="supplier image preview" id="supplier_output"/>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="hidden" name="company_id" value="0">
                            <button class="btn btn-success create-suppliers" type="Submit"><i class="fa fa-check"></i> Submit</button>
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
    <script src="../assets/scripts/supplier.js"></script>
    </body>
</html>