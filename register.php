<?php
  //Sessions use cookies which use header.
  //Must start before any HTML output
  //unless output buffereing is turned on
  //Session file resides on the server, rather than the header like cookies
  session_start(); 
  //setcookie($name, $value, $expire); setting the cookie
  //setcookie($name, null, time()- 3600); unsetting the cookie 
  if(isset($_POST['submit'])){
    //form was submitted, saving the email and password
    $first_name = $_POST['first_name'];  
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = md5($_POST['pwd']);
    //the confirm pasword is checked via jQuery

  }
  else{
    //get request sent to the login page 
    $first_name = "";
    $last_name = "";
    $email = "";
    $message = "*Kindly Register with proper Credentials";
  }
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Registration Form</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="assets/css/bootstrap.css" rel="stylesheet">
      <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
      <script src="javascript/jquery.js"></script>
      <script type="text/javascript" src="javascript/jquery.validate.js"></script> 
      <script type="text/javascript" src="javascript/validate.js"></script>
      <style type="text/css">

        a{
          color:green;
        }

        a:hover{
          text-decoration: underline;
          color: #0088cc;

        }


      </style>
    
    </head>
    
    <body>
      <div class="container">
        <div class="row">
          <div class="span8">

            <form class="form-horizontal" id="registerHere" method='post' action='register.php'>
            <fieldset>

              <?php echo $message; ?>

              <legend><a href="index.php">Login</a>/<a href="register.php">Registration</a></legend>
              <div class="control-group ">
                <label class="control-label">First Name</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="first_name" name="first_name" rel="popover" data-content="Enter your first name as per Matriculation Certificate." data-original-title="First Name">
                </div>
              </div>

              <div class="control-group ">
                <label class="control-label">Last Name</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="last_name" name="last_name" rel="popover" data-content="Enter your Last Name as per Matriculation Certificate." data-original-title="Last Name">
                </div>
              </div>

              <div class="control-group ">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="email" name="email" >
                </div>
              </div>

              <div class="control-group ">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge" id="pwd" name="pwd" >
                </div>
              </div>

              <div class="control-group ">
                <label class="control-label">Confirm Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge" id="cpwd" name="cpwd">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                  <input class="btn btn-success" name = "submit" type="submit" value="Submit" >
                  <button type="submit" class="btn btn-success" onclick="document.getElementById('registerHere').reset();">Reset</button>

                </div>
              </div>

            </fieldset>
            </form> 
          </div>
        </div>
      </div>
    </body>
  </html>

