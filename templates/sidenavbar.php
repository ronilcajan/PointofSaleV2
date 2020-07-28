<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="../assets/images/pos-icon.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-bold">POS.PHP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php if(!empty($n)):?>
            <div class="image">
                <img src="../uploads/avatar/<?php echo $im ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $n;?></a>
            </div>
            <?php else: ?>
                <div class="image">
                <img src="../assets/images/avatars/avatar.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Your name</a>
            </div>
            <?php endif?>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if(strpos($_SERVER['REQUEST_URI'],'pages')>0):?>
                <li class="nav-item has-treeview menu-open">
                    <a href="dashboard.php" class="nav-link active">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../pages/pos.php" class="nav-link">
                        <i class="nav-icon fas fa-barcode"></i>
                    <p>
                        Point of Sale
                    </p>
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item has-treeview">
                    <a href="../pages/dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-th-large"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="../pages/pos.php" class="nav-link">
                        <i class="nav-icon fas fa-barcode"></i>
                    <p>
                        Point of Sale
                    </p>
                    </a>
                </li>
                <?php endif ?>
                <?php if(strpos($_SERVER['REQUEST_URI'],'orders')>0):?>
                <li class="nav-item">
                    <a href="../orders/orders.php" class="nav-link active">
                        <i class="nav-icon fas fa-inbox"></i>
                    <p>
                        Orders
                    </p>
                    </a>
                </li>
                <?php else: ?>
                    <li class="nav-item">
                    <a href="../orders/orders.php" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                    <p>
                        Orders
                    </p>
                    </a>
                </li>
                <?php endif ?>
                <?php if(strpos($_SERVER['REQUEST_URI'],'sales')>0):?>
                <li class="nav-item">
                    <a href="../sales/sales.php" class="nav-link active">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>
                        Sales
                    </p>
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="../sales/sales.php" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>
                        Sales
                    </p>
                    </a>
                </li>
                <?php endif ?>
                <?php if(strpos($_SERVER['REQUEST_URI'],'products')>0):?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <small>
                        <li class="nav-item">
                            <a href="products_view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_products.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add/Edit Products</p>
                            </a>
                        </li>
                    </small>    
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            Products
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <small>
                        <li class="nav-item">
                            <a href="../products/products_view.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../products/add_products.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add/Edit Products</p>
                            </a>
                        </li>
                    </small>    
                    </ul>
                </li>
                <?php endif ?>
                <?php if(strpos($_SERVER['REQUEST_URI'],'customers')>0):?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <small>
                        <li class="nav-item">
                            <a href="customers_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="add_customers.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Customer</p>
                            </a>
                        </li>
                        </small>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Customers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <small>
                        <li class="nav-item">
                            <a href="../customers/customers_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Customers List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../customers/add_customers.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Customer</p>
                            </a>
                        </li>
                        </small>
                    </ul>
                </li>
                <?php endif ?>
                <?php if(strpos($_SERVER['REQUEST_URI'],'suppliers')>0):?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Suppliers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <small>
                        <li class="nav-item">
                            <a href="../suppliers/suppliers_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suppliers List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../suppliers/add_suppliers.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Suppliers</p>
                            </a>
                        </li>
                        </small>
                    </ul>
                </li>
                <?php else: ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Suppliers
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <small>
                        <li class="nav-item">
                            <a href="../suppliers/suppliers_list.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suppliers List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../suppliers/add_suppliers.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Suppliers</p>
                            </a>
                        </li>
                        </small>
                    </ul>
                </li>
                <?php endif ?>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shipping-fast"></i>
                        <p>
                            Deliveries
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Deliveries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Deliveries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Edit Suppliers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Reports
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>View Deliveries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Deliveries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/boxed.html" class="nav-link">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Edit Suppliers</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">SYSTEM</li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                        Logs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                        Users
                        </p>
                    </a>
                </li>
                <li class="nav-item mb-5">
                    <a href="pages/calendar.html" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                        Configuration
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>