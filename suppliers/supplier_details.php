<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
    include '../model/fetch_supplier.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>Supplier Profile · POS.PHP</title>
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
                            <h1 class="m-0 text-dark">Supplier Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Supplier Profile</li>
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
                                       src="../uploads/suppliers/<?php echo $pic;?>"
                                       alt="Supplier profile picture" id="supplier_output">
                                    <?php else: ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                       src="../assets/images/avatars/avatar.png"
                                       alt="Supplier profile picture" id="supplier_output">
                                    <?php endif ?>
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo $cname;?></h3>
                                    <p class="text-muted text-center">Supplier</p>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Supplier Info</h3>
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
                                    <p class="text-muted">
                                      <?php echo $number;?>
                                    </p>
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
                                        <li class="nav-item"><a class="nav-link active" href="#task" data-toggle="tab">Delivery</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Edit Profile</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- Task -->
                                        <div class="active tab-pane" id="task">
                                            <div class="table-responsive w-100">
                                                <table id="Suppliers_transaction_table" class="table table-striped table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Delivery No.</th>
                                                            <th>Discount</th>
                                                            <th>Amout</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Delivery No.</th>
                                                            <th>Discount</th>
                                                            <th>Amout</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Settings -->
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" id="supplier_form" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="size" value="1000000">
                                                <div class="form-group row">
                                                    <label for="inputImage" class="col-sm-2 col-form-label">Profile Image</label>
                                                    <div class="input-group col-sm-10">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*" onchange="supplierloadFile(event)" name="company_img" required>
                                                            <label class="custom-file-label" for="exampleInputFile">Choose Profile Picture</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Company Name</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="cname" id="inputName" placeholder="Company name" value="<?php echo $cname; ?>" required>
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
                                                        <input type="hidden" name="company_id" id="cus" value="<?php echo $supplier_id;?>">
                                                        <button type="submit" name="edit" class="btn btn-primary create-suppliers">Update</button>
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
    <script src="../assets/scripts/supplier.js"></script>
    </body>
</html>