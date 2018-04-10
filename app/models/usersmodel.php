<?php
require_once "/db/DAO_factory.php";
require_once "/validation/validation_factory.php";
require_once "basemodel.php";

/*
 * as REST has the same API , the MVC was constructed with the same API that only the Data ojects and validation are differnet
 * to add a new table to the database we only need extend the model and controller form the base classes , and construct the
 * DOA for this new table. This makes our code completly decoupled 
 * 
 * this below object is used to access the property table note it is the same as the bidModel except different
 * factories created.
 * 
 */


class usersModel extends baseModel
{
		protected function ConvertJSONToArray($parameters)
		{
			
			$safeArray = null;
    	 	$inputJson =$parameters["json"];
			
			
			 
			
   	    	$jo = json_decode($inputJson ,true);
	     	if( isset($inputJson) )
	     	{
	   		    $joTemp = json_decode($inputJson ,true);
				if( isset($joTemp["user_email"]) && isset($joTemp["user_password"]) )
				{
					$safeArray = $this->toSafeArray($joTemp , $parameters);
				}
				else 
				{
					$this->errordetails = MESSAGE_NO_INPUT_JSON;
				}
			}
			return $safeArray;
		}	
		public function toSafeArray($joTemp , $parameters)
		{
				$compare = null;
				//for signup
				if($this->validateEMAIL($joTemp["user_email"])){
					$compare["user_email"] =  $joTemp["user_email"];
				}
				
				$compare["user_password"] =  $this->clean($joTemp["user_password"]);
				
				
				
				//for full update
				$user_address=null;	$user_phone=null;	$user_date_of_birth=null;	$user_next_of_kin_relationship=null;
				$user_next_of_kin_phone=null;	$user_is_registered=null;$user_is_suspended=null;	$user_account_activated_date=null;
				$user_account_suspended_date=null;	$user_completed_medical=null;	$user_name=null;	$user_description=null;		$user_next_of_kin=null;
				$user_first_name=""; $user_last_name="";
				
				
				if(isset($joTemp["user_first_name"])){$user_first_name=$this->clean($joTemp["user_first_name"]);}
				if(isset($joTemp["user_last_name"])){$user_name=$this->clean($joTemp["user_last_name"]);}
						
				if(isset($joTemp["user_address"])){$user_address=$this->clean($joTemp["user_address"]);}
				if(isset($joTemp["user_name"])){$user_name=$this->clean($joTemp["user_name"]);}
				if(isset($joTemp["user_phone"])){$user_phone=$this->clean($joTemp["user_phone"]);}
				if(isset($joTemp["user_date_of_birth"])){$user_date_of_birth=$this->clean($joTemp["user_date_of_birth"]);}
				if(isset($joTemp["user_next_of_kin"])){$user_next_of_kin=$this->clean($joTemp["user_next_of_kin"]);}
				if(isset($joTemp["user_next_of_kin_relationship"])){$user_next_of_kin_relationship=$this->clean($joTemp["user_next_of_kin_relationship"]);}
				if(isset($joTemp["user_next_of_kin_phone"])){$user_next_of_kin_phone=$this->clean($joTemp["user_next_of_kin_phone"]);}
				if(isset($joTemp["user_is_registered"])){$user_is_registered=$this->clean($joTemp["user_is_registered"]);}
				if(isset($joTemp["user_is_suspended"])){$user_is_suspended=$this->clean($joTemp["user_is_suspended"]);}
				if(isset($joTemp["user_account_activated_date"])){$user_account_activated_date=$this->clean($joTemp["user_account_activated_date"]);}
				if(isset($joTemp["user_account_suspended_date"])){$user_account_suspended_date=$this->clean($joTemp["user_account_suspended_date"]);}
				if(isset($joTemp["user_completed_medical"])){$user_completed_medical=$this->clean($joTemp["user_completed_medical"]);}
				if(isset($joTemp["user_description"])){$user_description=$this->clean($joTemp["user_description"]);}
				
				$compare["user_first_name"]= $user_first_name;
				$compare["user_last_name"]= $user_last_name;
				$compare["user_address"]= $user_address;
				$compare["user_name"]=$user_name;
				$compare["user_phone"]=$user_phone;
				$compare["user_description"]=$user_description;
				$compare["user_date_of_birth"]=$user_date_of_birth;
				$compare["user_next_of_kin"]=$user_next_of_kin;
				$compare["user_next_of_kin_relationship"]=$user_next_of_kin_relationship;
				$compare["user_next_of_kin_phone"]=$user_next_of_kin_phone;
				$compare["user_is_registered"]=$user_is_registered;
				$compare["user_is_suspended"]=$user_is_suspended ;
				$compare["user_account_activated_date"]=$user_account_activated_date; 
				$compare["user_account_suspended_date"]=$user_account_suspended_date;
				$compare["user_completed_medical"]=$user_completed_medical ;
				//end full update.
		
				return $compare;
		}
		//our concrete implemention of the propertys DAO and the validation factory
		//for making sure that the input JSON from the user conforms to the database properties TABLE
		public function __construct()
		{
			//construct the factories
			parent::__construct();
			//set factories to build classes for the properties table
			$this->DAO =$this->DAO_Factory->getUsersDAO();
			//the validation for the properties table make sure they exist and in correct format
			//in the input JSON
			$this->validation = $this->validationFactory->getusersvalidation();
			
		}
		
}
?>