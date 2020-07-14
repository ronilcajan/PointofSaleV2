$(document).ready(function() {
    
    // ========== modal logout =========== 
    $('.logout').on('click', function(){
        swal({
            text: "Do you wish to logout?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((logout) => {
            if(logout){
                window.location.href='../model/logout.php';
            }
        });
    });

    // ======== Change password =============
    $('.change_password').on('click', function(){
        swal({
            title: 'Change Password',
            text: 'Enter your password',
            closeOnClickOutside: false,
            content: {
                element: 'input',
                attributes: {
                    placeholder: "Enter your password",
                    type: 'password'
                }
            },
            buttons: {
                cancel: true,
                button: {
                    text:'Confirm Password',
                    closeModal: false,
                } 
            },
        })
        .then(name => {
            if(name != null){
                swal({
                    title: 'Change Password',
                    text: 'Confirm your password',
                    closeOnClickOutside: false,
                    content: {
                        element: 'input',
                        attributes: {
                            placeholder: "Confirm your password",
                            type: 'password'
                        }
                    },
                    button: {
                        text: 'Change'
                    },
                })
                .then( pass => {
                    if(name == pass){
                        $.ajax({
                            type: "POST",
                            url: "../model/change_password.php",
                            data: {
                                pass: pass,
                            },
                            dataType: "json",
                            cache: false,
                            success: function(response) {
                                if (response.success == true) {
                                    toastr.success(response.message);
                                } else {
                                    toastr.error(response.message);
                                }
                            }
                        })
                    }else{
                        toastr.error("Password did not match!");
                    }

                });
            }else{
                toastr.warning("Password not change!");
            }
        });
    });


	$('#order_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../model/order_datatable.php"
    });

	$('#sales_table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "../model/sales_datatable.php"
    });
});