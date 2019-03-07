function SubmitFormData() {
	var firstname = $("#firstname").val();
	var lastname = $("#lastname").val();
	var email = $("#email").val();
	var phone = $("#phone").val();
	var address1 = $("#address1").val();
	var address2 = $("#address2").val();
	var number = $("#number").val();
	var date = $("#date").val();
	var comments = $("#comments").val();
	$.post("send-mail.php", { firstname: firstname, lastname: lastname, email: email, phone: phone, address1: address1, address2: address2, number: number, date: date, comments: comments }, function(data) {
		$('#results').html(data);
		$('#myForm')[0].reset();
	});
}

