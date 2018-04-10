<?php


require_once("Basedao.php");

/*
 * 
 * CREATE TABLE users
(
	user_id           int NOT NULL AUTO_INCREMENT,
	user_name            VARCHAR(50) NULL,
	user_address         VARCHAR(100) NULL,
	user_email           VARCHAR(100) NULL,
	user_phone           VARCHAR(20) NULL,
	user_password        VARCHAR(25) NULL,
	user_description     VARCHAR(100) NULL
	PRIMARY KEY (user_id)
);
 */


class usersDAO extends BaseDAO {
	
	public function isExisting($id){
	
		$sqlQuery ="SELECT count(*) as isExisting";
		$sqlQuery .=" FROM users";
		$sqlQuery .=" WHERE user_id=$id";
		$result =$this->getDbManager()->executeSelectQuery($sqlQuery);
		if($result[0]["isExisting"] == 1) 
				return (true);
		return (false);
	}
	//get all users
	public function getAllItems()
	{
		$sqlQuery ="SELECT * ";
		$sqlQuery .="FROM users";
		$result=$this->getDbManager()->executeSelectQuery($sqlQuery);
		return $result;
	}
	public  function getItemAnd($id , $id2)
	{
		throw new Exception("not implemented usersDAO::getItemAnd");
	}
	
	
	public  function updateItemValue($id , $id2 , $id3)
	{
		$sqlQuery ="UPDATE users SET $id2='$id3'";
		$sqlQuery .= " WHERE user_id=$id";
		//	echo $sqlQuery ;
		$result =$this->getDbManager()->executeQuery($sqlQuery);
		
		return $result;
	}
	public  function getItemValue($id , $id2)
	{
		$sqlQuery ="SELECT $id2 ";
		$sqlQuery .="FROM users";
		$sqlQuery .="  WHERE user_id=$id";
		//echo $sqlQuery ;
		$result =$this->getDbManager()->executeSelectQuery($sqlQuery);
		return $result;
		
		//read the values from the database ..
	//	throw new Exception("not implemented usersDAO::getItemValue");
	}
	//delete prop	
	public function deleteItem($id) 
	{
		$sqlQuery ="DELETE FROM users";
		$sqlQuery .=" WHERE user_id =$id";
		$result =$this ->getDbManager()->executeQuery($sqlQuery);
		return $result;
	}
	//To get a list of all bids for a particular property	
	public function getItem($id)
	{
		$sqlQuery ="SELECT * ";
		$sqlQuery .="FROM users";
		$sqlQuery .="  WHERE user_id=$id";
		$result =$this->getDbManager()->executeSelectQuery($sqlQuery);
		return $result;
	}
	
	public function insertItemArray($parameters)
	{
		//echo "insertItemArray";
		$user_name =  $parameters["user_name"];
		$user_first_name = $parameters["user_first_name"];
		$user_last_name = $parameters["user_last_name"];
		$user_address =  $parameters["user_address"];
		$user_email =  $parameters["user_email"];
		$user_phone =  $parameters["user_phone"];
		$user_password = $parameters["user_password"] ;
		$user_description =  $parameters["user_description"];
		$user_date_of_birth = $parameters["user_date_of_birth"];
		$user_next_of_kin = $parameters["user_next_of_kin"];
		$user_next_of_kin_relationship = $parameters["user_next_of_kin_relationship"];
		$user_next_of_kin_phone = $parameters["user_next_of_kin_phone"];
		$user_is_registered = $parameters["user_is_registered"];
		$user_is_suspended = $parameters["user_is_suspended"];
		$user_account_activated_date = $parameters["user_account_activated_date"];
		$user_account_suspended_date = $parameters["user_account_suspended_date"];
		$user_completed_medical = $parameters["user_completed_medical"];
		
		
		$sqlQuery = "INSERT INTO users(user_name,user_first_name,user_last_name,";
		$sqlQuery .= "user_address,user_email ,user_phone,";
		$sqlQuery .= "user_password,user_description,";
		$sqlQuery .= "user_date_of_birth,user_next_of_kin ,user_next_of_kin_relationship,";
		$sqlQuery .= "user_next_of_kin_phone,user_is_registered ,user_is_suspended,";
		$sqlQuery .= "user_account_activated_date,user_account_suspended_date ,user_completed_medical)";
		
		$sqlQuery .=" VALUES('$user_name','$user_first_name','$user_last_name',";
		$sqlQuery .="'$user_address','$user_email','$user_phone',";
		$sqlQuery .="'$user_password','$user_description',";
		$sqlQuery .="'$user_date_of_birth','$user_next_of_kin','$user_next_of_kin_relationship',";
		$sqlQuery .="'$user_next_of_kin_phone','$user_is_registered','$user_is_suspended',";
		$sqlQuery .="'$user_account_activated_date','$user_account_suspended_date','$user_completed_medical')";
		
		$result =$this->getDbManager()->executeQuery($sqlQuery);
	
		
		return  $result;
		
		
	}
	public function updateItemArray($user_id , $parameters)
	{
//echo "updateItemArray";
		//$user_id = $parameters["user_id"];
		$user_name =  $parameters["user_name"];
		$user_address =  $parameters["user_address"];
		$user_email =  $parameters["user_email"];
		$user_phone =  $parameters["user_phone"];
		$user_password = $parameters["user_password"] ;
		$user_description =  $parameters["user_description"];
		
		
		$user_first_name = $parameters["user_first_name"];
		$user_first_name = $parameters["user_last_name"];
		$user_date_of_birth = $parameters["user_date_of_birth"];
		$user_next_of_kin = $parameters["user_next_of_kin"];
		$user_next_of_kin_relationship = $parameters["user_next_of_kin_relationship"];
		$user_next_of_kin_phone = $parameters["user_next_of_kin_phone"];
		$user_is_registered = $parameters["user_is_registered"];
		$user_is_suspended = $parameters["user_is_suspended"];
		
		$user_account_activated_date = $parameters["user_account_activated_date"];
		$user_account_suspended_date = $parameters["user_account_suspended_date"];
		$user_completed_medical = $parameters["user_completed_medical"];
		
		$sqlQuery ="UPDATE users SET user_name='$user_name',
									user_address='$user_address', 
									user_email='$user_email', 
									user_email='$user_phone' ,
									user_phone='$user_password' , 
									user_password='$user_description' , 
									user_description='$user_description'  
									
		 ";
		$sqlQuery .= " WHERE user_id=$user_id";
		$result =$this->getDbManager()->executeQuery($sqlQuery);
		return $result;
	}
	
	
	//only for unit testing ... 
	public function getLast()
	{
		$sqlQuery= "SELECT MAX(user_id) as maxid FROM users;";
		$result = $this ->getDbManager()->executeSelectQuery($sqlQuery);
		return ($result[0]["maxid"]) ? $result[0]["maxid"] : -1 ;
	}
	
	public function getSearchForItem($id , $id2){
		//echo "get";
		//check for email address in db
		$sqlQuery ="SELECT count(*) as isExisting";
		$sqlQuery .=" FROM users";
		$sqlQuery .=" WHERE $id2='$id'";
		//echo $sqlQuery;
		$result =$this->getDbManager()->executeSelectQuery($sqlQuery);
		if($result[0]["isExisting"] == 1) 
				return (true);
		return (false);
		
		
		
	
	}
	

}
?>