<?php
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'products';
 
// Table's primary key
$primaryKey = 'product_no';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 
        'db' => 'product_no', 
        'dt' => 0, 
        'formatter' => function($d, $row){
            return '<a href="product_details.php?product_no='.$d.'" >'.$d.'</a>';
        }
    ),

    array( 
        'db' => 'name', 
        'dt' => 1,
        'formatter' => function($d, $row){
            return '<img class="img-fluid img-thumbnail img-preview" width="50" height="50" src="../uploads/products/'.$row[10].'" alt="product image preview" id="product_output" />'.$d;
        }
    ),
    array( 'db' => 'description', 'dt' => 2),

    array( 
        'db' => 'sell_price',   
        'dt' => 3,
        'formatter' => function( $d, $row ) {
            return 'P '.number_format($d);
        }
    ),
    array( 'db' => 'stocks', 'dt'        => 4),
    array( 'db' => 'unit', 'dt' => 5),
    array( 'db' => 'min_stocks', 'dt' => 6 ),
    array( 
        'db' => 'remarks', 
        'dt' => 7,
        'formatter' => function($d, $row){
            return '<span class="badge badge-info">'.$d.'</span>';
        }
    ),
    array( 'db' => 'location', 'dt' => 8),

    array( 
        'db' => 'product_no',
        'dt' => 9, 
        'formatter' => function( $d, $row ) {
            return '
                <button type="button" class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                      <i class="fa fa-cog"> </i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <button type="button" class="btn btn-link text-info dropdown-item" id="'.$d.'" title="View products"><span class=""><i class="fa fa-eye"> </i></span> View</button> 
                      <button type="button" class="btn btn-link edit_products text-success dropdown-item" id="'.$d.'" title="edit products"><span class=""><i class="fa fa-edit"> </i></span> Edit</button>
                      <button type="button" class="btn btn-link remove_products text-danger dropdown-item" id="'.$d.'" title="Remove products"><span class=""><i class="fa fa-minus-circle"> </i></span> Remove</button>
                    </div>';
        }
    ),
    array( 'db' => 'product_image', 'dt' => 10),

);
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'pos',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
// $joinQuery = "FROM sales JOIN customers ON sales.customer_id=customers.customer_id";
// $extraCondition = "`id_client`=".$ID_CLIENT_VALUE;
require( '../assets/plugins/datatables/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns)
);
