//======= customer image preview before upload =====
var customerloadFile = function(event) {
	var output = document.getElementById("customer_output");
	output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function(){
	// ========= Customer DataTables =========
	$('#customers_table').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "../model/customers_datatable.php"
    });

    // ========== Delete customers ================
	$('#customers_table').on('click','tbody tr .remove_customer', function(){
		var id = $(this).attr('id');

		swal({
		  	title: "Remove this customer?",
		  	text: "Note: All customer transactions will be lost!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {

		  	if (willDelete) {

		  		$.ajax({
					type: "POST",
					url: "../model/remove_customer.php",
					data: {
						id: id
					},
					dataType: "json",
					cache: false,
					success: function(response) {
						if (response.success == true) {
							toastr.success(response.message);
							$("#customers_table").DataTable().ajax.reload();
						} else {
							alert(response.message);
							toastr.error(response.message);
						}
					}
				});
		    	
		  	} 
		});
	});


	// ========== Insert/Edit Customer ==============
	$('.create-customers').on('click', function(){
		var formdata = new FormData(document.getElementById("customer_form"));

		if( $('.fname').val() != '' && 
			$('.lname').val()  != '' && 
			$('.address').val()  != '' && 
			$('.email').val()  != '' && 
			$('.number').val()  != '' )
		{
			$.ajax({
				type: "POST",
				url: "../model/customer.php",
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
			if($('.fname').val() == '' ){
				toastr.warning("Firstname is required!");
			}
			if($('.lname').val() == '' ){
				toastr.warning("Lastname is required!");
			}
			if($('.address').val() == '' ){
				toastr.warning("Address is required!");
			}
			if($('.email').val() == '' ){
				toastr.warning("email is required!");
			}
			if($('.number').val() == '' ){
				toastr.warning("Contact number is required!");
			}
		}
		return false;
	});

});