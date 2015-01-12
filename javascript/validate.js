
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
	      	email:{required:true,email: true},
	      	pwd:{required:true, minlength: 6},
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
      		email:{
      			required:"Enter your email address",
      			email:"Enter valid email address"
      		},
      		pwd:{
      			required:"Enter your password",
      			minlength:"Password must be minimum 6 characters",
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
          pwd:{required:true, minlength: 6},
          
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