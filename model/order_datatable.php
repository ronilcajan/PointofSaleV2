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
$table = 'orders';
 
// Table's primary key
$primaryKey = 'order_no';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 
        'db' => 'order_no', 
        'dt' => 0, 
        'formatter' => function($d, $row){
            return '<a href="order_details.php?order_no='.$d.'" >'.$d.'</a>';
        },
        'field' => 'order_no' ),
    array( 
        'db' => 'firstname',
        'dt' => 1,
        'formatter' => function($d, $row){
            return '<a href="../customers/customers.php?customer_id='.$row[8].'" >'.ucwords($row[1].' '.$row[7]).'</a>';
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
        'db' => 'status',
        'dt' => 5, 
        'formatter' => function($d, $row){
            if($d == 'Paid'){
                return '<span class="badge badge-success">'.$d.'</span>';
            }else{
                return '<span class="badge badge-info">'.$d.'...</span>';
            }
        },
        'field' => 'status'),

    array( 
        'db' => 'order_no',
        'dt' => 6, 
        'formatter' => function( $d, $row ) {
            if($row[5] == 'Paid'){
                return '
                    <button type="button" class="mr-1 btn btn-link remove_orders p-0 pb-1" id="'.$d.'" title="Remove?"><span class="text-danger"><i class="fa fa-minus-circle"> </i></span> </button>';
            }else{
                return '
                    <button type="button" class="mr-1 btn btn-link payment_settled p-0 pb-1" id="'.$d.'" title="Payment settled?"><span class="text-success"><i class="fa fa-handshake"> </i></span> </button> 
                    <button type="button" class="mr-1 btn btn-link remove_orders p-0 pb-1" id="'.$d.'" title="Remove?"><span class="text-danger"><i class="fa fa-minus-circle"> </i></span> </button> 
                    <a href="order_invoice.php?order_no='.$d.'" title="Generate Invoice"><span class="text-info"><i class="fa fa-file"></i></span></a>';
            }
        },
        'field' => 'order_no' ),


    array( 'db' => 'lastname', 'dt' => 7, 'field' => 'lastname' ),
    array( 'db' => 'customers.customer_id', 'dt' => 8, 'field' => 'customer_id' ),
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
$joinQuery = "FROM orders JOIN customers ON orders.customer_id=customers.customer_id";
// $extraCondition = "ORDER BY customers.customer_id ASC";
require( '../assets/plugins/datatables/ssp.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns,$joinQuery)
);
