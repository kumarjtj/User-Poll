var frmvalidator = new Validator("myform"); 
 frmvalidator.addValidation("firstname","req","Please Enter User First Name"); 
 frmvalidator.addValidation("firstname","maxlen=50");
 frmvalidator.addValidation("lastname","req","Please Enter User Last Name"); 
 frmvalidator.addValidation("lastname","maxlen=50");
 frmvalidator.addValidation("username","req","Please Enter User Name"); 
 frmvalidator.addValidation("username","maxlen=50");
 frmvalidator.addValidation("password","req","Please Enter  User Password"); 
 frmvalidator.addValidation("password","minlen=6","Password must not be less than 6 characters.");
