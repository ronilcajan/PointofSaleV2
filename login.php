<?php include 'server/server.php'; ?>
<?php
    if($_SESSION){
        header('location: pages/dashboard.php');
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Point of Sale on PHP.">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="icon" type="images/png" sizes="180x180" href="../assets/images/pos-icon.png">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">

        <title>Login · POS.PHP</title>
        <!-- Custom styles for this login -->
        <link href="assets/style/signin.css" rel="stylesheet">
    </head>
    <body class="text-center bg-midnight-bloom">
        <?php include 'templates/loading_screen.php'; ?>
        <form class="form-signin mt-5" method="POST" id="quickForm">
            <img class="mb-4" src="assets/images/pos-logo.png" alt="" width="300" height="68">
            <div class="card">
                <div class="card-body">
                    <h5 class="h5 mb-3 font-weight-normal">Please Login</h5>
                    <label for="inputText" class="sr-only">Username</label>
                    <input type="text" id="inputText" class="form-control username has-error" placeholder="Username" name="username" required autofocus>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control password" placeholder="Password" name="password" required>
                    <button class="btn btn-lg btn-block mt-5 btn-secondary login" >Login</button>
                </div>
            </div>
            <p class="mt-5 mb-3 text-muted text-light">&copy; 2020</p>
        </form>
        <script src="assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/scripts/query_script.js"></script>
    </body>
</html>
    