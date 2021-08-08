function validateForm() {
    var name=document.myform.name.value;
    var email=document.myform.email.value;  
    var username=document.myform.username.value;  
    var dob=document.myform.dob.value; 
          
        if (name==null || name==""){  
          alert("Name can't be blank");  
          return false;  
        }  
        else if (email==null || email==""){  
          alert("email can't be blank");  
          return false;
        } else if(username==null || username==""){  
            alert("username can't be blank");  
            return false;  
        }else if(dob==null || dob==""){  
            alert("dob can't be blank.");  
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
    
    function checkdob() {
        if (document.getElementById("dob").value == "") {
              document.getElementById("dobErr").innerHTML = "Date of Birth can't be blank";
              document.getElementById("dobErr").style.color = "red";
              document.getElementById("dob").style.borderColor = "red";
        }else{
              document.getElementById("dobErr").innerHTML = "";
            document.getElementById("dob").style.borderColor = "black";
        }}