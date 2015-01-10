
$(document).ready(function(){

    jQuery.validator.addMethod(
        'StrongPassword',
        function (value) { 
            return /^(?=.*[_$@.])(?=.*[A-Z])(?=.*[^_$@.])[\w$@.]{8,15}$/.test(value); 
        },  
        'Your password must have one special character, one number, one lower case and one upper case character.'
    );
    jQuery.validator.addMethod(
        'NameCheck',
        function (value) { 
            return /^([A-Za-z]*)$/.test(value); 
        },  
        'Enter only characters.'
    );  

    
    // Validation
    $("#registerHere").validate({
    	rules:{
	      	
	      	first_name:{required:true, NameCheck:true},
	      	last_name:{required:true, NameCheck:true},
	      	mobile:{required:true, number: true, minlength:10, maxlength:10},
          designation:{required:true},
	      	email:{required:true,email: true},
	      	pwd:{required:true, minlength: 8, StrongPassword: true},
	      	cpwd:{required:true, equalTo: "#pwd"},

    	},

      	messages:{
      		
      		first_name:{
            required:"Enter your first name",
            NameCheck:"Enter only Characters"
          },
      		last_name:{
            required:"Enter your last name",
            NameCheck:"Enter only characters"
          },
      		mobile:{
      			required:"Enter your mobile number",
      			number: "Enter a valid number",
      		},
      		
      		email:{
      			required:"Enter your email address",
      			email:"Enter valid email address"
      		},
      		pwd:{
      			required:"Enter your password",
      			minlength:"Password must be minimum 8 characters",
      			StrongPassword: "Your password must contain at least one special character, one number, one lower case and one upper case character"
      		},
      		cpwd:{
      			required:"Enter confirm password",
      			equalTo:"Password and Confirm Password must match"
      		},
      		
      	},

    errorClass: "help-inline",
    errorElement: "span",
      
    highlight:function(element, errorClass, validClass){      	
    	$(element).parents('.control-group').addClass('error');
    },
      
    unhighlight: function(element, errorClass, validClass){
    	$(element).parents('.control-group').removeClass('error');
      	$(element).parents('.control-group').addClass('success');
      }
    });
    
    //second validation
    $("#loginHere").validate({
      rules:{
          
          
          email:{required:true,email: true},
          pwd:{required:true, minlength: 8, StrongPassword: true},
          
      },

        messages:{
          
          email:{
            required:"Enter your email address",
            email:"Enter valid email address"
          },
          pwd:{
            required:"Enter your password",
          },
                    
        },

    errorClass: "help-inline",
    errorElement: "span",
      
    highlight:function(element, errorClass, validClass){        
      $(element).parents('.control-group').addClass('error');
    },
      
    unhighlight: function(element, errorClass, validClass){
      $(element).parents('.control-group').removeClass('error');
        $(element).parents('.control-group').addClass('success');
      }
    });
});