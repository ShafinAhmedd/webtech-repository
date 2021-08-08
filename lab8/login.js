function validateform(){  
    var username=document.myform.username.value;  
    var password=document.myform.password.value;  
      
    if (username==null || username==""){  
      alert("Name can't be blank");  
      return false;  
    }else if(password.length<6){  
      alert("Password must be at least 6 characters long.");  
      return false;  
      }  
    } 