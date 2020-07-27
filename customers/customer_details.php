<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
    include '../model/fetch_customer.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Customer Profile · POS.PHP</title>
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
                            <h1 class="m-0 text-dark">Customer Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Customer  Profile</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                    <?php if (!empty($pic)):?>
                                        <img class="profile-user-img img-fluid img-circle"
                                       src="../uploads/customers/<?php echo $pic;?>"
                                       alt="Customer profile picture" id="customer_output">
                                    <?php else: ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                       src="../assets/images/avatars/avatar.png"
                                       alt="Customer profile picture" id="customer_output">
                                    <?php endif ?>
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo $fname.' '.$lname;?></h3>
                                    <p class="text-muted text-center">Customer</p>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Customer Info</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                                    <p class="text-muted">
                                    <?php echo $address;?>
                                    </p>

                                    <hr>

                                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>
                                    <p class="text-muted">
                                        <?php echo $email;?>
                                    </p>
                                    <hr>

                                    <strong><i class="fas fa-mobile mr-1"></i> Contact No.</strong>

                                    <?php if (!empty($number)):?> 
                            
                                    <p class="text-muted">
                                      <?php echo $number;?>
                                    </p>
                                    <?php else: ?>
                                    <p class="text-muted">Your number here</p>
                                    <?php endif ?>
                                    
                                    <hr>
                                    
                                </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                          <!-- /.col -->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#task" data-toggle="tab">Transactions</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- Task -->
                                        <div class="active tab-pane" id="task">
                                            <div class="table-responsive w-100">
                                                <table id="customers_transaction_table" class="table table-striped table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Transaction No.</th>
                                                            <th>Discount</th>
                                                            <th>Amout</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                          <?php  while($row = $res->fetch_assoc()){ ?>
                                                            <tr>
                                                                <td><?php echo $row['receipt_no'];?></td>
                                                                <td><?php echo number_format($row['discount']);?></td>
                                                                <td><?php echo number_format($row['amount']);?></td>
                                                                <td><?php echo date( 'jS M y', strtotime($row['date']));?>
                                                                </td>
                                                                <td>
                                                                    <a type="button" href="sales_details.php?receipt_no=<?php echo $row['receipt_no'];?>" class="btn btn-link text-info"><span class="" title="View customer details"><i class="fa fa-eye"> </i></span></a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Transaction No.</th>
                                                            <th>Discount</th>
                                                            <th>Amout</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>

                                                    </tfoot>
                                                </table>
                                            </div>
                                            <nav aria-label="Page navigation">
                                                <ul class="pagination justify-content-end">
                                                    <li class="page-item"><a class="page-link" href="customer_details.php?customer_id=<?php echo $_GET['customer_id']?>&&pageno=1">First</a></li>

                                                    <li class="page-item <?php if($pageno <= 1){ echo 'disabled';} ?>">
                                                      <a class="page-link" href="customer_details.php?customer_id=<?php echo $_GET['customer_id']?>&&<?php if($pageno <= 1){ echo '#'; } else { echo "pageno=".($pageno - 1 ); }?> ">Previous</a>
                                                    </li>

                                                    <li class="page-item <?php if($pageno >= $total_pages){ echo 'disabled';} ?>">
                                                        <a class="page-link" href="customer_details.php?customer_id=<?php echo $_GET['customer_id']?>&&<?php if($pageno >= $total_pages){ echo '#'; } else { echo "pageno=".($pageno + 1 ); }?> ">Next</a>
                                                    </li>

                                                    <li class="page-item">
                                                      <a class="page-link" href="customer_details.php?customer_id=<?php echo $_GET['customer_id']?>&&pageno=<?php echo $total_pages; ?>">Last</a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <!-- Settings -->
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" id="customer_form" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="size" value="1000000">
                                                <div class="form-group row">
                                                    <label for="inputImage" class="col-sm-2 col-form-label">Profile Image</label>
                                                    <div class="input-group col-sm-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" onchange="customerloadFile(event)" name="customer_img" required>
                                                            <label class="custom-file-label" for="exampleInputFile">Choose Profile Picture</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">First Name</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="fname" id="inputName" placeholder="Name" value="<?php echo $fname; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Last Name</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="lname" id="inputName" placeholder="Lastname" value="<?php echo $lname; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                                    <div class="col-sm-10">
                                                      <textarea class="form-control" name="address" id="inputExperience" placeholder="Address" required><?php echo $address; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email address" value="<?php echo $email; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Contact No.</label>
                                                    <div class="col-sm-10">
                                                      <input type="number" class="form-control" name="number" id="inputName2" placeholder="Contact number" value="<?php echo $number; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <input type="hidden" name="customer_id" id="cus" value="<?php echo $cus_id;?>">
                                                        <button type="submit" name="edit" class="btn btn-primary create-customers">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                    <!-- /.tab-content -->
                                </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php include '../templates/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include '../templates/footer-links.php'; ?>
    <script src="../assets/scripts/customer.js"></script>
    </body>
</html>