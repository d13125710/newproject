<?php


require_once("baseValidation.php");

class userValidation extends baseValidation {

	
	public function checkValidParameters($parameters)
	{
 	  
		
   		return $parameters;

	}
	public function toSafeArray($parameters)
	{

		 //$compare = null;
		// $compare["user_id"] = $parameters["user_id"];
		// $compare["user_last_name"] = $parameters["user_name"];
		// $compare["user_first_name"] = $parameters["user_first_name"];
		// $compare["user_email"] = $parameters["user_email"];
		//// $compare["user_phone"] = $parameters["user_phone"];
	 	// $compare["user_password"] = $parameters["user_password"] ;
		// $compare["user_description"] = $parameters["user_description"];
		 return $parameters;
		
	}
	
	

}