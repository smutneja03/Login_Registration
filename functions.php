<?php

	function redirect_to($location) {
    	if ($location != NULL) {
        	header("Location: {$location}");
        	exit;
    	}
	}

	function password_encrypt($password){
		//Tells PHP to use Blowfish with a cost of 10
		$hash_format = "$2y$10$";
		//Blowfish salts should be 22 characters or more
		$salt_length = 22;
		$salt = generate_salt($salt_length);
		$format_and_salt = $hash_format . $salt;
		$hash = crypt($password, $format_and_salt);
		return $hash;
	}

	function generate_salt($length){
		//Not 100%unique, not 100%random, but good enough for a salt
		//MD5 returns 32 characterrs
		$unique_random_string = md5(uniqid(mt_rand(), true));

		//Valid characters for a asalt are [a-zA-Z0-9./]
		$base64_string = base64_encode($unique_random_string);

		//But not '+' which is valid in base64 encoding
		$modified_base64_String = str_replace('+', '.', $base64_string);

		//Truncate string to the correct length
		$salt = substr($modified_base64_String, 0, $length);

		return $salt;
	}


	function password_check($password, $existing_hash){
		//existing hash contains format and salt at start
		$hash =  crypt($password, $existing_hash);
		if($hash===$existing_hash){
			return true;
		}
		else{
			return false;
		}
	}

	function find_user_by_email($email){

		$query = "Select * from users where email = '{$email}' limit 1";
		$user_set = mysql_query($query);

		if($user = mysql_fetch_assoc($user_set)){
			return $user;
		}
		else{
			return null;
		}
	}

	function attempt_login($email, $password){
		$user = find_user_by_email($email);

		if($user){
			//found user, now check password
			if(password_check($password, $user["pwd"])){
				//password matches
				return $user;
			}
			else{
				//password does not match
				return false;
			}
		}
		else{
			return false;
		}
	}

	function check_presence($email){
		$user = find_user_by_email($email);

		if($user){
			return true;
		}
		else{
			return false;
		}
	}
?>