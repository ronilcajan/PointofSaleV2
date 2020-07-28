//======= supplier image preview before upload =====
var supplierloadFile = function(event) {
	var output = document.getElementById("supplier_output");
	output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function(){
	// ========= Customer DataTables =========
	$('#suppliers_table').DataTable({
        "processing": true,
        "serverSide": true,
        "autoWidth": false,
        "ajax": "../model/supplier_datatable.php"
    });

    // ========== Delete customers ================
	$('#suppliers_table').on('click','tbody tr .remove_supplier', function(){
		var id = $(this).attr('id');

		swal({
		  	title: "Remove this supplier?",
		  	text: "Note: All supplier transactions will be lost!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {

		  	if (willDelete) {

		  		$.ajax({
					type: "POST",
					url: "../model/remove_supplier.php",
					data: {
						id: id
					},
					dataType: "json",
					cache: false,
					success: function(response) {
						if (response.success == true) {
							toastr.success(response.message);
							$("#suppliers_table").DataTable().ajax.reload();
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
	$('.create-suppliers').on('click', function(){
		var formdata = new FormData(document.getElementById("supplier_form"));

		if( $('.cname').val() != '' && 
			$('.address').val()  != '' && 
			$('.email').val()  != '' && 
			$('.number').val()  != '' )
		{
			$.ajax({
				type: "POST",
				url: "../model/supplier.php",
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
			if($('.cname').val() == '' ){
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