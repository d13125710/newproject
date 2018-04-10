<?php
require_once("baseController.php");

class questionController extends baseController {

	//this is an abstract function that needs to be implemented for each new conntroller we wish to add 
	// it takes JSON input for each controller and returns JSON of the input coforms to the layout defined here
	// for success we return the JSON decoded for false we return NULL
	public function checkValidInputParameters($parameters)
	{
	   $jo = null;
	   
	   	   $inputJson =$parameters["json"];
	   	   $jo = json_decode($inputJson ,true);
		   return $jo;
	}
	
	
	
	
}
?>