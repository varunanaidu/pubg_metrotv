// var fm_password = document.getElementById("fm-password");
// var lowercase = document.getElementById("fm-password-tooltip-lowercase");
// var uppercase = document.getElementById("fm-password-tooltip-uppercase");
// var number = document.getElementById("fm-password-tooltip-number");
// var symbol = document.getElementById("fm-password-tooltip-symbol");
// var length_input = document.getElementById("fm-password-tooltip-length");

function validateForm() {
	"use strict";
	
	var fm = document.getElementById("formRegister");
	var reg_para = document.getElementById("secRegisterPara");
	
	var fm_name_1 = document.getElementById("fm-name-1");
	var fm_name_2 = document.getElementById("fm-name-2");
	var fm_name_3 = document.getElementById("fm-name-3");
	var fm_email = document.getElementById("fm-email");
	var fm_phone = document.getElementById("fm-phone");
	var fm_pubg_id = document.getElementById("fm-pubg-id");
	var fm_age = document.getElementById("fm-age");
	var fm_gender = document.getElementsByName("fm-gender");
	
	var textOutput = document.getElementById("validationInfo");
	var text;
	
	if (!fm_name_1.checkValidity()) {
		text = "<span style=\"color:#e74c3c\">&#10006; Enter your Full Name.</span>";
		fm_name_1.focus();
    }else if (!fm_name_2.checkValidity()) {
		text = "<span style=\"color:#e74c3c\">&#10006; Enter your Full Name. Double checking.</span>";
		fm_name_2.focus();
    }else if (fm_name_1.value !== fm_name_2.value) {
		text = "<span style=\"color:#e74c3c\">&#10006; Name fields do not match.</span>";
		fm_name_2.focus();
    }else if (!fm_name_3.checkValidity()) {
		text = "<span style=\"color:#e74c3c\">&#10006; Enter your Full Name. Triple checking.</span>";
		fm_name_3.focus();
    }else if (fm_name_1.value !== fm_name_3.value) {
		text = "<span style=\"color:#e74c3c\">&#10006; Name fields do not match.</span>";
		fm_name_3.focus();
    }else if (!fm_email.checkValidity()) {
		text = "<span style=\"color:#e74c3c\">&#10006; Enter a valid E-mail address.</span>";
		fm_email.focus();
    }else if (!fm_phone.checkValidity()) {
		text = "<span style=\"color:#e74c3c\">&#10006; Enter your 10-digit Mobile Number.</span>";
		fm_phone.focus();
	}else if (!fm_pubg_id.checkValidity()) {
		text = "<span style=\"color:#e74c3c\">&#10006; Enter your 9-digit PUBG ID.</span>";
		fm_pubg_id.focus();
    }else if (!fm_age.checkValidity()) {
		if (fm_age.validity.rangeUnderflow) {
			text = "<span style=\"color:#e74c3c\">&#10006; Your age must be above 16 to participate.</span>";
			fm_age.focus();
		}else if (fm_age.validity.rangeOverflow){
			text = "<span style=\"color:#e74c3c\">&#10006; You are too old to participate.</span>";
			fm_age.focus();
		}else {
			text = "<span style=\"color:#e74c3c\">&#10006; Enter your Age.</span>";
			fm_age.focus();
		}
	}else if (fm_gender[0].checked === false && fm_gender[1].checked === false) {
		text = "<span style=\"color:#e74c3c\">&#10006; Select your Gender.</span>";
    }else {
		console.log('test');
		// textOutput.innerHTML = "";
		// reg_para.innerHTML = "<span style=\"color:#ECB500;font-size:1.5rem;font-weight:bold;\">Registration Successful!</span>";
		// fm.innerHTML = "";
		// return true;
	}
	
	textOutput.innerHTML = text;
	return false;
}