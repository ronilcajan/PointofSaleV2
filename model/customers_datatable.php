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
$table = 'customers';
 
// Table's primary key
$primaryKey = 'customer_id';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 
        'db' => 'customer_id', 
        'dt' => 0, 
        'formatter' => function($d, $row){
            return '<a href="customer_details.php?customer_id='.$d.'" >'.$d.'</a>';
        }
    ),

    array( 
        'db' => 'firstname', 
        'dt' => 1,
        'formatter' => function($d, $row){
            if(empty($row[7])){
                return ucwords($d.' '.$row[6]);
            }else{
                return '
                    <img class="img-fluid img-thumbnail img-preview" width="50" height="50" src="../uploads/customers/'.$row[7].'" alt="image preview" id="product_output" />'.ucwords( $d.' '.$row[6]);
            }
        }
    ),
    array( 'db' => 'address', 'dt' => 2),
    array( 'db' => 'email',  'dt' => 3),
    array( 'db' => 'contact_no', 'dt' => 4),

    array( 
        'db' => 'customer_id',
        'dt' => 5, 
        'formatter' => function( $d, $row ) {
            return '
                <a type="button" href="customer_details.php?customer_id='.$row[0].'" class="btn btn-link text-info"><span class="" title="View customer details"><i class="fa fa-eye"> </i></span></a>
                <button type="button" class="btn btn-link remove_customer text-danger" id="'.$d.'" title="Remove customer"><span class=""><i class="fa fa-minus-circle"> </i></span></button>';
        }
    ),
    array( 'db' => 'lastname', 'dt' => 6),
    array( 'db' => 'customer_img', 'dt' => 7),


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
