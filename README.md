# Login_Registration
Template for User login and Registration using PHP/MySQL with jQuery Validation and Blowfish Authentication.

The main files the Web Application consists of are:

1. base.php
Contains all the things that are required to establish a connection with the database.

2. index.php
The default front page, which allows user to login into the system. The two fields that are involved in the authentication process are email ID and Password. The back end authentication is done via Blowfish Hashing. 

3. register.php
Consists of entries namely first_name, last_name, email, password, confirm_password. The fields are validated in place using jQuery which is placed in the file javascript/validate.js. 

4. functions.php
COnsists of functions that are comonly used in the Login and Registration. 

