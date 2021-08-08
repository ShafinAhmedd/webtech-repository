function validateForm() {
        var name=document.myform.name.value;
        var email=document.myform.email.value;  
        var username=document.myform.username.value;  
        var psw=document.myform.psw.value; 
        var dob=document.myform.dob.value;
		var password=document.myform.password.value;
        var image=document.myform.image.value;  
			  
			if (name==null || name==""){  
			  alert("Name can't be blank");  
			  return false;  
			}else if(password==null || password==""){  
			  alert("Confirm must be at least 6 characters long.");  
			  return false;  
			}  
			else if (email==null || email==""){  
			  alert("email can't be blank");  
			  return false;
			} else if (psw==null || psw==""){
                alert("password can't be blank");  
                return false;
            } else if(username==null || username==""){  
                alert("username can't be blank");  
                return false;  
            }else if(dob==null || dob==""){  
                alert("dob can't be blank.");  
                return false;
            }else if(image==null || image==""){ 
                alert("image can't be blank.");  
                return false;  
            }
            }
		function checkEmpty() {
		  	if (document.myform.username.value = "") {
		  		alert("username can't be blank");
		        return false;  
		  	}
		  }  
		function checkName() {
			if (document.getElementById("name").value == "") {
			  	document.getElementById("nameErr").innerHTML = "Name can't be blank";
			  	document.getElementById("nameErr").style.color = "red";
			  	document.getElementById("name").style.borderColor = "red";
			}else{
			  	document.getElementById("nameErr").innerHTML = "";
				document.getElementById("name").style.borderColor = "black";
			}
			
        }
        function checkUsername() {
			if (document.getElementById("username").value == "") {
			  	document.getElementById("usernameErr").innerHTML = "username can't be blank";
			  	document.getElementById("usernameErr").style.color = "red";
			  	document.getElementById("username").style.borderColor = "red";
			}else{
			  	document.getElementById("usernameErr").innerHTML = "";
				document.getElementById("username").style.borderColor = "black";
			}
			
        }
        function checkemail() {
			if (document.getElementById("email").value == "") {
			  	document.getElementById("emailErr").innerHTML = "email can't be blank";
			  	document.getElementById("emailErr").style.color = "red";
			  	document.getElementById("email").style.borderColor = "red";
			}else{
			  	document.getElementById("emailErr").innerHTML = "";
				document.getElementById("email").style.borderColor = "black";
			}
			
        }
        function checkpassword() {
			if (document.getElementById("password").value == "") {
			  	document.getElementById("passwordErr").innerHTML = "password can't be blank";
			  	document.getElementById("passwordErr").style.color = "red";
			  	document.getElementById("password").style.borderColor = "red";
			}else{
			  	document.getElementById("passwordErr").innerHTML = "";
				document.getElementById("password").style.borderColor = "black";
			}
			
        }
		function checkpsw() {
			if (document.getElementById("psw").value == "") {
			  	document.getElementById("pswErr").innerHTML = "Comfirm password can't be blank";
			  	document.getElementById("pswErr").style.color = "red";
			  	document.getElementById("psw").style.borderColor = "red";
			}else{
			  	document.getElementById("pswErr").innerHTML = "";
				document.getElementById("psw").style.borderColor = "black";
			}
			
        }
        function checkdob() {
			if (document.getElementById("dob").value == "") {
			  	document.getElementById("dobErr").innerHTML = "Date of Birth can't be blank";
			  	document.getElementById("dobErr").style.color = "red";
			  	document.getElementById("dob").style.borderColor = "red";
			}else{
			  	document.getElementById("dobErr").innerHTML = "";
				document.getElementById("dob").style.borderColor = "black";
			}}
            function checkimage() {
                if (document.getElementById("image").value == "") {
                      document.getElementById("imageErr").innerHTML = "Date of Birth can't be blank";
                      document.getElementById("imageErr").style.color = "red";
                      document.getElementById("image").style.borderColor = "red";
                }else{
                      document.getElementById("imageErr").innerHTML = "";
                    document.getElementById("image").style.borderColor = "black";
                }}