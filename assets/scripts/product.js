//======= product image preview before upload =====
var productloadFile = function(event) {
	var output = document.getElementById("product_output");
	output.src = URL.createObjectURL(event.target.files[0]);
};

$(document).ready(function(){

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

});