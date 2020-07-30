<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Delivery Overview · POS.PHP</title>
        <!-- Search Dropdown full width -->
        <style type="text/css">
            .dropdown-menu {
                width: 100%;
            }
            input[type=number]::-webkit-inner-spin-button,
            input[type=number]::-webkit-outer-spin-button{
                -webkit-appearance: none;
                margin: 0;
                appearance:none;
            }
            input[type=number]{
                -moz-appearance:none;
                 appearance:none;
            }
        </style>
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
                            <h1 class="m-0 text-dark">Deliveries</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Deliveries</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <a type="button" href="add_delivery.php" class="btn btn-primary btn-sm mb-2" title="Add Delivery"><i class="fa fa-plus"></i> New Supplier</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="inputText">Supplier(from):</label>
                                        <div class="input-group tt-input">
                                            
                                            <input type="text" class="form-control rounded-1 supplier " id="supplier_search" placeholder="Search supplier name..." name="supplier_name" autocomplete="off" required>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat"><i class="fa fa-user-tie"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="inputText">Transaction No.</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-1 serial" id="inputTextserial" name="product_no" value="" required readonly>  
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-info btn-flat serial_search disabled"><i class="fa fa-exchange-alt"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-sm-6 d-flex justify-content-end">
                                    <div class="col-sm-6 text-left">
                                        <div class="form-group">
                                            <label for="inputText">Upload Excel/CSV File</label>
                                            <div class="input-group">
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-info btn-flat"><i class="fa fa-upload"></i></button>
                                                </span>
                                                <input type="text" class="form-control rounded-1 serial" id="inputTextserial" placeholder="Enter product serial number/barcode..." name="product_no" value="" required>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No.</th>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Buy Price</th>
                                        <th>Unit</th>
                                        <th>Tax(%)</th>
                                        <th>Min. Qty</th>
                                        <th>Sell Price</th>
                                        <th>Sub.Total</th>
                                        <th>Remarks</th>
                                        <th>Location</th>
                                        <th class="text-center"><button type="button" class="btn btn-success btn-xs btn-flat"> <i class="fa fa-plus-circle"></i></button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control form-control-sm"></td>
                                        <td><input type="text" class="form-control form-control-sm"></td>
                                        <td><input type="number" min="1" class="form-control form-control-sm"></td>
                                        <td><input type="number" min="1" class="form-control form-control-sm"></td>
                                        <td><input type="text" class="form-control form-control-sm"></td>
                                        <td><input type="number" min="1" class="form-control form-control-sm"></td>
                                        <td><input type="number" min="1" class="form-control form-control-sm"></td>
                                        <td><input type="text" class="form-control form-control-sm" placeholder="Sell Price" readonly></td>
                                        <td><input type="text" class="form-control form-control-sm" placeholder="Total" readonly></td>
                                        <td><input type="text" class="form-control form-control-sm"></td>
                                        <td><input type="text" class="form-control form-control-sm"></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="10" class="text-right">Grand Total:</th>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-right">
                            <button type="button" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                        </div>
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
    <script src="../vendor/jquery-typeahead/typeahead.min.js"></script>
    <script src="../assets/scripts/delivery.js"></script>
    </body>
</html>