<?php 
    include '../server/server.php';
    if(!$_SESSION['username']){
        header("location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Point of Sale · POS.PHP</title>
        <link rel="stylesheet" type="text/css" href="../assets/style/pos.css">
    </head>
    <body class="hold-transition">
        <div class="wrapper m-0">
            <div class="row h-25">
                <div class="col-md-4">
                    <img src="../assets/images/pos-logo.png" class="img-fluid mt-2">
                </div>
                <div class="col-md-4 text-light"><small>
                    <div class="form-group row w-100 pt-3">
                        <label class="col-sm-4">User logged on: </label>
                        <div class="col-sm-8">
                            <p class="p-0 ml-1"><i class="fas fa-user-shield">&nbsp</i><?php echo ucfirst($_SESSION['user_type']);?></p>                        
                        </div>
                    </div>
                    <div class="form-group row w-100" style="margin-top: -28px">
                        <label class="col-sm-4">Date: </label>
                        <div class="col-sm-8">
                            <p class="p-0 ml-1" id="time"><i class="fas fa-calendar-alt">&nbsp</i></p>                        
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: -20px">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Customer:</label>
                        <div class="col-sm-6">
                          <input type="text" id="customer" class="form-control form-control-sm" placeholder="Customer Name" value="Customer">
                        </div>
                        <div class="col-sm-2">
                          <button class="btn btn-sm btn-secondary">New</button>
                        </div>
                    </div>
                </small>
                </div>
                <div class="col-md-4">
                    <div class=" grand">
                        <p align="left" class="ml-2">Grand Total:</p>
                        <p class="mr-2 grand-total">P 0.00</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div id="orders" class="table-responsive">
                        <form method="POST" action="">
                        <table class="table w-100 font-weight-bold table-head-fixed text-nowrap" id="table2">
                            <thead>
                                <tr class='text-center'>
                                    <th>SKU#</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Unit</th>
                                    <th>Qty</th>
                                    <th>Sub.Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_orders">
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-1">
                        <input type="text" class="form-control rounded-1" placeholder="Barcode/Description search..." autofocus>
                        <span class="input-group-append">
                            <button type="button" class="btn btn-danger btn-flat rounded-1"><i class="fa fa-times"></i></button>
                        </span>
                    </div>
                    <div id="product_search" class="table-responsive">
                        <table class="table table-sm table-head-fixed text-nowrap" id="table1">
                            <thead>
                                <tr class='text-center font-weight-bold'>
                                    <td>SKU#</td>
                                    <td>Description</td>
                                    <td>SRP</td>
                                    <td>Stocks</td>
                                    <td>Location</td>
                                </tr>
                                </thead>
                                <tbody id="search_products">
                                    

                                </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
            <div class="row h-25">
                <div class="col-md-4 text-light">
                    <a class="btn btn-lg btn-danger ml-2" id="pos-buttons">
                         <i class="fas fa-ban"></i> Cancel
                    </a>
                    <a class="btn btn-lg btn-secondary ml-2" id="pos-buttons">
                        <i class="fas fa-download"></i> Pay Later
                    </a>
                    <a class="btn btn-lg btn-secondary ml-2" id="pos-buttons">
                        <i class="fas fa-handshake"></i> Pay Now
                    </a>
                </div>
                <div class="col-md-4 text-light">
                    <div class="form-group row w-100" style="margin-top: -5px;">
                        <label for="inputEmail3" class="col-sm-3"><small>Total:</small></label>
                        <div class="col-sm-3">
                            <p class="p-0 ml-1"><small>100</small></p>                       
                        </div>
                        <div class="col-sm-3">
                            <p class="p-0 ml-1"><small>2000.00</small></p>                       
                        </div>
                    </div>
                    <div class="form-group row" style="margin-top: -30px; margin-bottom: 0px;">
                        <label for="inputEmail3" class="col-sm-5 col-form-label"><small>Discount:</small></label>
                        <div class="col-sm-3">
                          <input type="number" id="discount" min="0" step="10" class="form-control form-control-sm text-right" placeholder="Add Discount" value="0">
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-light" align="right">
                    <a class="btn btn-lg btn-secondary mr-2" title="Check Orders" id="pos-buttons">
                        <i class="fas fa-inbox"></i> Orders
                    </a>
                        <a class="btn btn-lg btn-secondary mr-2" href="dashboard.php" title="Dashboard" id="pos-buttons">
                            <i class="fas fa-th-large"></i> Dashboard
                        </a>
                        <a class="btn btn-lg btn-danger mr-2" title="Logout" id="pos-buttons">
                            <i class="fas fa-power-off"></i> Logout
                        </a>
                </div>
            </div>
        </div>
    <?php include '../templates/footer-links.php'; ?>
    <script src="../assets/scripts/time.js"></script>
    </body>
</html>