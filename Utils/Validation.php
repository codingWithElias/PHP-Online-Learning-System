<?php  

class Validation{
	static function clean($str){
		$str = trim($str);
		$str = stripcslashes($str);
		$str = htmlspecialchars($str);
		return $str;
	}
    
    static function name($str){
		# Letters Only 
		$name_regex = "/^([a-zA-Z' ]+)$/";
		if (preg_match($name_regex, $str)) 
			return true;
        else return false;
	}
	static function username($str){
		// Must start with letter [A-Za-z]
		// 5-8 characters  {5,8}
		// Letters and numbers only [A-Za-z0-9]
		$username_regex = "/^[A-Za-z][A-Za-z0-9]{4,8}$/";
		if (preg_match($username_regex, $str)) 
			return true;
        else return false;
	}
	static function email($str){
		if (filter_var($str, FILTER_VALIDATE_EMAIL)) 
			return true;
        else return false;
	}
	static function password($str){
		/*
	     -> Has minimum 4 characters in length. Adjust it by modifying {4,}

	    -> At least one uppercase English letter. (?=.*?[A-Z])
	     At least one lowercase English letter.  (?=.*?[a-z])
	    -> At least one digit. (?=.*?[0-9])
	    -> At least one special character, (?=.*?[#?!@$%^&*-])
	    
	    
    	*/

		// $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/"; 

		// if (preg_match($password_regex, $str)) 
		  if (!empty($str)) return true;
		  else return false;
        // else return false;
	}
	static function match($str1, $str2){
		if ($str1 === $str2) 
			return true;
        else return false;
	}

}