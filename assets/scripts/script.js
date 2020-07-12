$(document).ready(function() {
	$('#order_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../model/order_datatable.php"
    });
});

$(document).ready(function() {
	$('#sales_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../model/sales_datatable.php"
    });
});