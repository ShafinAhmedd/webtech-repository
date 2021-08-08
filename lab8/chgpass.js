function validateform(){  
    var currpassword=document.myform.currpassword.value;  
    var password=document.myform.password.value;  
    var confpassword=document.myform.confpassword.value;

    if (currpassword==null || currpassword==""){  
      alert("Current Password can't be blank");  
      return false;  
    }else if(password.length<6){  
      alert("Password must be at least 6 characters long.");  
      return false;  
      }else if(confpassword==password){
      alert("Confirm Password must be match with New Password.");  
      return false;  
      } 
    }
    function checkEmpty() {
          if (document.myform.currpassword.value = "") {
              alert("Name can't be blank");
            return false;  
          }
      }  
    function checkCurrPass() {
        if (document.getElementById("currpassword").value == "") {
            document.getElementById("currpasswordErr").innerHTML = "password can't be blank";
            document.getElementById("currpasswordErr").style.color = "red";
            document.getElementById("currpassword").style.borderColor = "red";
      }else{
            document.getElementById("currpasswordErr").innerHTML = "";
          document.getElementById("currpassword").style.borderColor = "black";
      }
        
    }
    function checkPass(){
        if (document.getElementById("password").value == "") {
            document.getElementById("passwordErr").innerHTML = "password can't be blank";
            document.getElementById("passwordErr").style.color = "red";
            document.getElementById("password").style.borderColor = "red";
      }else{
            document.getElementById("passwordErr").innerHTML = "";
          document.getElementById("password").style.borderColor = "black";
      }
    }
    function checkConfPass(){
        if (document.getElementById("confpassword").value == "") {
            document.getElementById("confpasswordErr").innerHTML = "password can't be blank";
            document.getElementById("confpasswordErr").style.color = "red";
            document.getElementById("confpassword").style.borderColor = "red";
      }else{
            document.getElementById("confpasswordErr").innerHTML = "";
          document.getElementById("confpassword").style.borderColor = "black";
      }
    }