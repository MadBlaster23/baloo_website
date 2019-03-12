function post() {
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address1 = document.getElementById("address1").value;
    var address2 = document.getElementById("address2").value;
    var number = document.getElementById("number").value;
    var date = document.getElementById("date").value;
    var comments = document.getElementById("comments").value;
    if(firstname && lastname && email && phone && address1 && address2 && number && date || comments) {
        $.ajax( {
            type: 'post',
            url: 'send-mail.php',
            data: {
                first_name:firstname,
		        last_name:lastname,
                user_email:email,
                user_phone:phone,
                user_address1:address1,
                user_address2:address2,
                user_number:number,
                user_date:date,
                user_comments:comments
            },
            success: function (response) {
	            swal(
                    'Thank you!',
                    'Form submitted successfully',
                    'success'
                )
            }
        });
    }
    document.getElementById("myForm").reset();
    return false;
}
