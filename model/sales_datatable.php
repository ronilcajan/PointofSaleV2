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
$table = 'sales';
 
// Table's primary key
$primaryKey = 'receipt_no';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 
        'db' => 'receipt_no', 
        'dt' => 0, 
        'formatter' => function($d, $row){
            return '<a href="sale_details.php?receipt_no='.$d.'" >'.$d.'</a>';
        },
        'field' => 'receipt_no' ),
    array( 
        'db' => 'firstname',
        'dt' => 1,
        'formatter' => function($d, $row){
            return '<a href="../customers/customers.php?customer_id='.$row[7].'" >'.ucwords($row[1].' '.$row[6]).'</a>';
        },
        'field' => 'firstname' ),
    array( 
        'db' => 'discount',   
        'dt' => 2,
        'formatter' => function( $d, $row ) {
            return '- P '.number_format($d);
        },
        'field' => 'discount'
    ),
    array( 
        'db' => 'amount',   
        'dt' => 3,
        'formatter' => function( $d, $row ) {
            return 'P '.number_format($d);
        },
        'field' => 'amount'
    ),
    array(
        'db'        => 'date',
        'dt'        => 4,
        'formatter' => function( $d, $row ) {
            return date( 'jS M y', strtotime($d));
        }
        ,'field' => 'date'
    ),
    array( 
        'db' => 'receipt_no',
        'dt' => 5, 
        'formatter' => function( $d, $row ) {
                return '
                    <a href="sales/order_invoice.php?receipt_no='.$d.'" title="View Receipt"><span class="text-info"><i class="fa fa-file"></i></span></a>';
                },
        'field' => 'receipt_no' ),

    array( 'db' => 'lastname', 'dt' => 6, 'field' => 'lastname' ),
    array( 'db' => 'customers.customer_id', 'dt' => 7, 'field' => 'customer_id' ),
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
$joinQuery = "FROM sales JOIN customers ON sales.customer_id=customers.customer_id";
// $extraCondition = "`id_client`=".$ID_CLIENT_VALUE;
require( 'ssp.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery)
);
