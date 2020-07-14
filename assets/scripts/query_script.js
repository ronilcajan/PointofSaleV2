// =============  Login code here ==================
$(".login").click(function(e) {
	e.preventDefault();
	var user = $(".username").val();
	var pass = $(".password").val();

	if (!$.trim(user)) {
		toastr.warning("Please enter your username!");
		$(".username").focus();
	} else if (!$.trim(pass)) {
		toastr.warning("Please enter you password!");
		$(".password").focus();
	} else {
		$.ajax({
			type: "POST",
			url: "model/login.php",
			data: {
				username: user,
				password: pass
			},
			dataType: "json",
			cache: false,
			beforeSend: function() {
			        $("#loading-screen").show();
			    },
			success: function(response) {
				if (response.success == true) {
					window.location = 'pages/'+response.message;
				} else {
					$("#loading-screen").hide();
					toastr.error(response.message);
				}
			}
		});
		return false;
	}
});