<?php 
    include '../server/server.php';
    include '../model/check_auth.php';
    include '../model/fetch_profile.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include '../templates/header.php'; ?>
        <title>My Profile · POS.PHP</title>
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
                            <h1 class="m-0 text-dark">My Profile</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">My Profile</li>
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
                                       src="../assets/images/avatars/<?php echo $pic;?>"
                                       alt="User profile picture">
                                    <?php else: ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                       src="../assets/images/avatars/avatar.png"
                                       alt="User profile picture">
                                    <?php endif ?>
                                    </div>
                                    <?php if (!empty($name)):?>
                                        <h3 class="profile-username text-center"><?php echo $name;?></h3>
                                        <p class="text-muted text-center"><?php echo $_SESSION['user_type'];?></p>
                                   <?php else: ?>
                                        <h3 class="profile-username text-center">Your name here</h3>
                                        <p class="text-muted text-center">Your position here</p>
                                <?php endif ?>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">About Me</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                    <?php if (!empty($education)):?> 
                            
                                    <p class="text-muted">
                                        <?php echo $education;?>
                                    </p>
                                    <?php else: ?>
                                        <p class="text-muted">
                                          B.S. in Computer Science from the University of Tennessee at Knoxville
                                        </p>
                                    <?php endif ?>
                                    <hr>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <?php if (!empty($location)):?> 
                            
                                        <p class="text-muted">
                                        <?php echo $location;?>
                                        </p>
                                    <?php else: ?>
                                        <p class="text-muted">Malibu, California</p>
                                    <?php endif ?>

                                    <hr>

                                    <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                                    <?php if (!empty($email)):?> 
                            
                                    <p class="text-muted">
                                        <?php echo $email;?>
                                    </p>
                                    <?php else: ?>
                                        <p class="text-muted">Your email here</p>
                                    <?php endif ?>
                                    
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

                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                    <?php if (!empty($notes)):?> 
                            
                                    <p class="text-muted">
                                      <?php echo $notes;?>
                                    </p>
                                    <?php else: ?>
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                                    <?php endif ?>
                                    
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
                                        <li class="nav-item"><a class="nav-link active" href="#task" data-toggle="tab">My Task</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                                    </ul>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <!-- Task -->
                                        <div class="active tab-pane" id="task">
                                            <div class="table-responsive w-100">
                                                <button class="btn btn-success btn-sm mb-2" title="Add task" data-toggle="modal" data-target="#task_modal"><i class="fa fa-plus"></i> Task</button>
                                                <table class="table table-striped table-head-fixed text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Task Desciption</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if(!empty($task)){ 
                                                            $i = 1;
                                                        ?>
                                                        <?php foreach ($task as $tsk){ ?>
                                                            <tr class="task<?php echo $tsk['task_id'];?>">
                                                                <td><?php echo $i;?></td>
                                                                <td><?php echo $tsk['activity'];?></td>
                                                                <td>
                                                                    <?php if($tsk['status'] == 'Doned'):?>
                                                                        <span class="badge badge-success"><?php echo $tsk['status'];?></span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-info"><?php echo $tsk['status'];?></span>
                                                                    <?php endif ?>
                                                                </td>
                                                                <td>
                                                                    <?php if($tsk['status'] == 'Doned'):?>
                                                                       
                                                                    <?php else: ?>
                                                                        <button type="button" class="btn btn-sm btn-link task_done" title="Done" id="<?php echo $tsk['task_id'];?>"><i class="fa fa-check-square"></i></button>

                                                                        <button type="button" class="btn btn-sm btn-link edit_task" title="Edit" id="<?php echo $tsk['task_id'];?>"><i class="fa fa-edit text-success"></i></button>
                                                                       
                                                                    <?php endif ?>
                                                                      <button type="button" class="btn btn-sm btn-link task_delete" title="Delete" id="<?php echo $tsk['task_id'];?>"><i class="fa fa-times-circle text-danger"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr class="cancel_task<?php echo $tsk['task_id'];?>"style="display: none;">
                                                                <td><?php echo $i;?></td>
                                                                <form id="edit_task_form<?php echo $tsk['task_id'];?>">
                                                                    <td><input type="text" name="task" value="<?php echo $tsk['activity'];?>"></td>
                                                                
                                                                <td>
                                                                    <?php if($tsk['status'] == 'Doned'):?>
                                                                        <span class="badge badge-success"><?php echo $tsk['status'];?></span>
                                                                    <?php else: ?>
                                                                        <span class="badge badge-info"><?php echo $tsk['status'];?></span>
                                                                    <?php endif ?>
                                                                </td>
                                                                <input type="hidden" name="id" value="<?php echo $tsk['task_id'];?>">
                                                                <td>
                                                                    <button type="button" class="btn btn-sm btn-link edit_task_submit" title="Update" id="<?php echo $tsk['task_id'];?>"><i class="fa fa-check-circle text-success"></i></button>
                                                                    <button type="button" class="btn btn-sm btn-link cancel_edit_task" title="Cancel" id="<?php echo $tsk['task_id'];?>"><i class="fa fa-times text-danger"></i></button>
                                                                </td>
                                                                </form>
                                                            </tr>
                                                        <?php $i++; }} ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Task Desciption</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>

                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- Settings -->
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" id="profile_form" method="POST" enctype="">
                                                <input type="hidden" name="size" value="1000000">
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Profile Image</label>
                                                    <div class="col-sm-10">
                                                      <input type="file" name="img" id="inputName2" accept="image/*" value="<?php echo $pic; ?>" required>
                                                    </div>
                                                </div>
                                                
                                                <?php if(empty($education) && empty($name) && empty($location) && empty($email) && empty($number) && empty($notes)):?>

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Education</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="education" id="inputName" placeholder="Education" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Location</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="location" id="inputName" placeholder="Location" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                    <div class="col-sm-10">
                                                      <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email address" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName2" class="col-sm-2 col-form-label">Contact No.</label>
                                                    <div class="col-sm-10">
                                                      <input type="number" class="form-control" name="number" id="inputName2" placeholder="Contact number" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Notes</label>
                                                    <div class="col-sm-10">
                                                      <textarea class="form-control" name="notes" id="inputExperience" placeholder="Notes" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <input type="hidden" name="create">
                                                        <button type="submit" name="create" class="btn btn-primary create-profile">Submit</button>
                                                    </div>
                                                </div>

                                                <?php else: ?>

                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="name" id="inputName" placeholder="Name" value="<?php echo $name; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Education</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="education" id="inputName" placeholder="Education" value="<?php echo $education; ?>" required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="inputName" class="col-sm-2 col-form-label">Location</label>
                                                    <div class="col-sm-10">
                                                      <input type="text" class="form-control" name="location" id="inputName" placeholder="Location" value="<?php echo $location; ?>" required>
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
                                                    <label for="inputExperience" class="col-sm-2 col-form-label">Notes</label>
                                                    <div class="col-sm-10">
                                                      <textarea class="form-control" name="notes" id="inputExperience" placeholder="Notes" required><?php echo $notes; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <input type="hidden" name="edit">
                                                        <button type="submit" name="edit" class="btn btn-primary create-profile">Update</button>
                                                    </div>
                                                </div>
                                            <?php endif ?>
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
        <!-- task modal -->
        <div class="modal fade" id="task_modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Create Task</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="" id="task_form">
                            <label>Enter your task:</label>
                            <input type="text" name="task" class="form-control" placeholder="Enter task" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success create_task">Save</button>
                    </div>
                    </form>
                </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
      <!-- /.modal -->

        <!-- Main Footer -->
        <?php include '../templates/footer.php'; ?>
    </div>
    <!-- ./wrapper -->
    <?php include '../templates/footer-links.php'; ?>
    <script src="../assets/scripts/profile.js"></script>
    </body>
</html>