$(document).ready(function(){

	// ==================== Create Profile ================

	$('.create-profile').on('click', function(){
		var formdata = new FormData(document.getElementById("profile_form"));
		$.ajax({
			type: "POST",
				url: "../model/profile.php",
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

		return false;

	});

	//  =============== Create Task =======================

	$('.create_task').on('click', function(){
		var formdata = new FormData(document.getElementById("task_form"));

		$.ajax({
			type: "POST",
				url: "../model/task.php",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				success: function(response) {
					if (response.success == true) {
						toastr.success(response.message);
						$('#task_modal').modal('hide');
						setTimeout(function() {
							window.location.reload(1);
						}, 2000);

					} else {
						toastr.error(response.message);
					}
				}

		});

		return false;

	});

	// ========= Task done ==============

	$('.task_done').on('click', function(){
		var id = $(this).attr('id');

		$.ajax({
			type: "POST",
				url: "../model/task_done.php",
				method: "POST",
				dataType: "json",
				data: {
					id:id
				},
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

		return false;

	});

	// ======================= Delete Task ====================

	$('.task_delete').on('click', function(){
		var id = $(this).attr('id');

		$.ajax({
			type: "POST",
				url: "../model/task_delete.php",
				method: "POST",
				dataType: "json",
				data: {
					id:id
				},
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

		return false;

	});

	//  ======== Show edit form ==============
	$('.edit_task').on('click', function(){
		var id = $(this).attr('id');

		$('.task'+id).slideDown('1000', function(){
	    	$(this).hide();
		});
		$('.cancel_task'+id).show();
	});
	// ============ Close edit form ================== 
	$('.cancel_edit_task').on('click', function(){
		var id = $(this).attr('id');
		$('.cancel_task'+id).slideDown('1000', function(){
	    	$(this).hide();
		});
		$('.task'+id).show();
	});

	//  =============== Edit Task =======================

	$('.edit_task_submit').on('click', function(){
		var id = $(this).attr('id');
		var formdata = new FormData(document.getElementById("edit_task_form"+id));
		$.ajax({
			type: "POST",
				url: "../model/edit_task.php",
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

		return false;

	});

});