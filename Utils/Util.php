<?php  

class Util{
	static function redirect($location, $type, $em, $data=""){
	    header("Location: $location?$type=$em&$data");
	    exit;
	}


}