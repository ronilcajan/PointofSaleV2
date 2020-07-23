//======= product image preview before upload =====
var productloadFile = function(event) {
	var output = document.getElementById("product_output");
	output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function(){
	// ========= Products DataTables =========
	$('#products_table').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "../model/product_datatable.php"
    });

	// ========== Insert/Edit Products ==============
	$('.create-products').on('click', function(){
		var formdata = new FormData(document.getElementById("product_form"));

		if( $('.serial').val() != '' && 
			$('.name').val()  != '' && 
			$('.description').val()  != '' && 
			$('.price').val()  != '' && 
			$('.stocks').val()  != '' && 
			$('.price').val()  != '' && 
			$('.min_stocks').val()  != '' && 
			$('.remarks').val()  != '' &&
			$('.location').val()  != '' )
		{
			$.ajax({
				type: "POST",
				url: "../model/product.php",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				success: function(response) {
					if (response.success == true) {
						toastr.success(response.message);
						setTimeout(function() {
							window.location.reload(1);
						}, 2000);
					} else {
						toastr.error(response.message);
					}
				}
			});
		}else{
			if($('.serial').val() == '' ){
				toastr.warning("Product serial number is required!");
			}
			if($('.name').val() == '' ){
				toastr.warning("Product name is required!");
			}
			if($('.description').val() == '' ){
				toastr.warning("Product description is required!");
			}
			if($('.price').val() == '' ){
				toastr.warning("Product price is required!");
			}
			if($('.stocks').val() == '' ){
				toastr.warning("Number of stocks is required!");
			}
			if($('.unit').val() == '' ){
				toastr.warning("Product unit is required!");
			}
			if($('.min_stocks').val() == '' ){
				toastr.warning("Minimum stocks is required!");
			}
			if($('.remarks').val() == '' ){
				toastr.warning("Product remarks is required!");
			}
			if($('.location').val() == '' ){
				toastr.warning("Product location is required!");
			}
		}
		return false;
	});

	// =========== Search Products ==============
	$('.serial_search').on('click', function(){
		var serial_no = $('.serial').val();

		if(serial_no.trim() != ''){

			$.ajax({
				type: "POST",
				url: "../model/edit_products.php",
				dataType: "json",
				data: {serial_no:serial_no.trim()},
				cache: false,
				success: function(response) {
					if (response.success == true) {
						toastr.success(response.message);

						$('.name').val(response.products.name);
						$('.description').val(response.products.description);
						$('.price').val(response.products.sell_price);
						$('.stocks').val(response.products.stocks);
						$('.unit').val(response.products.unit);
						$('.min_stocks').val(response.products.min_stocks);
						$('.remarks').val(response.products.remarks);
						$('.location').val(response.products.location);
						$('.img-preview').attr('src', "../uploads/products/"+response.products.product_image);

					} else {
						toastr.error(response.message);
					}
				}
			});

		}else{

			toastr.warning("Please enter serial number!");

		}
	});

	// ========== Delete Products ================
	$('#products_table').on('click','tbody tr .remove_products', function(){
		var id = $(this).attr('id');

		swal({
		  	title: "Are you sure?",
		  	text: "Once removed, you will not be able to recover this product!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {

		  	if (willDelete) {

		  		$.ajax({
					type: "POST",
					url: "../model/remove_product.php",
					data: {
						id: id
					},
					dataType: "json",
					cache: false,
					success: function(response) {
						if (response.success == true) {
							toastr.success(response.message);
							$("#products_table").DataTable().ajax.reload();
						} else {
							$("#loading-screen").hide();
							toastr.error(response.message);
						}
					}
				});
		    	
		  	} 
		});
	});

	// ========== Edit Products redirect ================
	$('#products_table').on('click','tbody tr .edit_products', function(){
		var serial_no = $(this).attr('id');

		swal({
		  	title: "Edit this product?",
		  	text: "You will be redirected to the edit product page!",
		  	icon: "info",
		  	buttons: true,
		  	dangerMode: false,
		})
		.then((edit_products) => {
			
		  	if (edit_products) {
				window.location.href='../products/add_products.php?product_no='+serial_no;
		  	} 
		});
	});

});