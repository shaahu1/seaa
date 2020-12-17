function check_cname() {
	var pattern=/^[A-Za-z. ]*$/;
	var cmpName=$("#cmpName").val();
	if (pattern.test(cmpName) && cmpName !=='') {
		$("#cmpName").css("border-bottom","2px solid #34f458");
	}else{
		$("#cmpName").css("border-bottom","2px solid #f90a0a");
	}
}

function check_uname() {
	var pattern=/^[A-Za-z0-9]*$/;
	var usName=$("#usName").val();
	if (pattern.test(usName) && usName !=='') {
		$("#usName").css("border-bottom","2px solid #34f458");
	}else{
		$("#usName").css("border-bottom","2px solid #f90a0a");
	}
}

function check_email(){
	var pattern=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
	var email=$("#email").val();
	if(pattern.test(email) && email !==''){
		$("#email").css("border-bottom","2px solid #34f458");
	}else{
		$("#email").css("border-bottom","2px solid #f90a0a");
	}
}

function check_pass1(){
	var pattern=/^[A-Za-z0-9].{7,}$/;
	var pass1=$("#pass1").val();
	if (pattern.test(pass1)){
		$("#pass1").css("border-bottom","2px solid #34f458");
	}else {
		$("#pass1").css("border-bottom","2px solid #f90a0a")
	}
}

function check_pass2(){
	var pattern=/^[A-Za-z0-9].{7,}$/;
	var pass1=$("#pass1").val();
	var pass2=$("#pass2").val();
	if (pattern.test(pass2)) {
		if ($("#pass1").val() == $("#pass2").val()) {
			$("#pass2").css("border-bottom","2px solid #34f458");
		}else{
			$("#pass2").css("border-bottom","2px solid #f90a0a");
		}
	}else {
		$("#pass2").css("border-bottom","2px solid #ffffff");
	}
	
}