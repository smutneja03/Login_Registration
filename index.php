<?php
  //Sessions use cookies which use header.
  //Must start before any HTML output
  //unless output buffereing is turned on
  //Session file resides on the server, rather than the header like cookies
  session_start();  
  //setcookie($name, $value, $expire); setting the cookie
  //setcookie($name, null, time()- 3600); unsetting the cookie
  
  // 1. Create a database connection
  include "base.php";
  
  if(isset($_POST['submit'])){
    //form was submitted, saving the email and password
    $email = mysql_real_escape_string($_POST['email']);
    $password = mysql_real_escape_string($_POST['pwd']);
    // 2. Perform database query
    $query = "Select * from users where email='{$email}' 
              and pwd = '{$password}' ";

    $result = mysql_query($query);
    //Test if there is a query error
    if(!$result){
      $message = "*Database query failed";
    }
    else{
      $results = mysql_num_rows();
      if($results != 1){
        $message = "*Credentials Not matched";
      }
      else{
        //row containing the user data has been fetched
        //will be saved in the session variables and passed
        $user = mysql_fetch_assoc($result);
        //saving the data in session variables
        $_SESSION['username'] = $user['first_name']. " ". $user['last_name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['logged_in'] = 1;
      }
    }
  }

  else{
    //index page is repeatedly refreshed
    $email = "";
    $message = "*Kindly Login with proper Credentials";
  }
?>

<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <title>Login Form</title>
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

            <form class="form-horizontal" id="loginHere" method='post' action='index.php'>
            <fieldset>

              <legend><a href="index.php">Login</a>/<a href="register.php">Registration</a></legend>
              
              <?php echo $message; ?>
              
              <div class="control-group ">
                <label class="control-label">Email</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="email" name="email" value=
                  <?php echo htmlspecialchars($email); ?> >
                </div>
              </div>

              <div class="control-group ">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" class="input-xlarge" id="pwd" name="pwd">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                  <input class="btn btn-success" name = "submit" type="submit" value="Submit">
                  <button type="submit" name = "reset" class="btn btn-success" onclick="document.getElementById('loginHere').reset();">Reset</button>

                </div>
              </div>

            </fieldset>
            </form> 
          </div>
        </div>
      </div>
    </body>
  </html>
