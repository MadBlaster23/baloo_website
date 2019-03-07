function ValidateEmail(inputText){
	var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!inputText.value.match(mailformat)){
        alert("You have entered an invalid email address");
        document.form.email.focus();
        return false;
    }
    return true;
}
