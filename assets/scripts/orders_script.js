$(document).ready(function(){
	
	// ========== delete button ============
	$('#order_table').on('click','tbody tr .remove_orders', function(){
		var id = $(this).attr('id');

		swal({
		  	title: "Are you sure?",
		  	text: "Once removed, you will not be able to recover this order!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {

		  		$.ajax({
					type: "POST",
					url: "../model/remove_order.php",
					data: {
						id: id
					},
					dataType: "json",
					cache: false,
					success: function(response) {
						if (response.success == true) {
							toastr.success(response.message);
							$("#order_table").DataTable().ajax.reload();
						} else {
							$("#loading-screen").hide();
							toastr.error(response.message);
						}
					}
				});
		    	
		  	} 
		});
	});

	// ========== payment settle button ============
	$('#order_table').on('click','tbody tr .payment_settled', function(){
		var id = $(this).attr('id');

		swal({
		  	title: "Payment settled?",
		  	text: "Once click, this order will marked as paid!",
		  	icon: "success",
		  	buttons: true,
		  	dangerMode: false,
		})
		.then((willDelete) => {
		  	if (willDelete) {

		  		$.ajax({
					type: "POST",
					url: "../model/order_settled.php",
					data: {
						id: id
					},
					dataType: "json",
					cache: false,
					success: function(response) {
						if (response.success == true) {
							toastr.success(response.message);
							$("#order_table").DataTable().ajax.reload();
						} else {
							$("#loading-screen").hide();
							toastr.error(response.message);
						}
					}
				});
		    	
		  	} 
		});
	});

});