<?php


require_once("baseValidation.php");

class questionValidation extends baseValidation {

	
	public function checkValidParameters($parameters)
	{
 	   $safeArray = null;
   
   	   $inputJson =$parameters["json"];
      if( isset($inputJson) )
	   {
			$joTemp = json_decode($inputJson ,true);
			if(isset($joTemp["questions"])) //&& isset($joTemp["user_id"]) && isset($joTemp["property_id"]) )
			{
				
				$safeArray = $this->toSafeArray($joTemp);
			}
			else 
			{
				$this->errordetails = MESSAGE_FORM_ERRORS_STR;
			}
		}
		else 
			{
				$this->errordetails = MESSAGE_NO_INPUT_JSON;
			}
   		return $safeArray;

	}
	public function toSafeArray($parameters)
	{
		 $compare = null;
		 $compare["questionid"] = $parameters["questionid"];
		 $compare["question"] = $parameters["question"];
		 return $compare;
		
	}
	
	

}