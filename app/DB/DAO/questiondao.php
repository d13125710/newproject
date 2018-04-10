<?php


require_once("Basedao.php");


/*
 * 
 * 
 CREATE TABLE medicalrecords
(
  questionid int(255) NOT NULL  AUTO_INCREMENT,
  questions text  NULL,
  unasigned1 int(11)  NULL,
  unasigned2 int(11)  NULL,
  unasigned3 int(11)  NULL,
  PRIMARY KEY (`questionid`)
);
 */


class usersDAO extends BaseDAO {
	
	public function isExisting($id){
	
		$sqlQuery ="SELECT count(*) as isExisting";
		$sqlQuery .=" FROM medicalrecords";
		$sqlQuery .=" WHERE questionid=$id";
		$result =$this->getDbManager()->executeSelectQuery($sqlQuery);
		if($result[0]["isExisting"] == 1) 
				return (true);
		else return (false);
	}
	//get all questions
	public function getAllItems()
	{
		$sqlQuery ="SELECT * ";
		$sqlQuery .="FROM medicalrecords";
		$result=$this->getDbManager()->executeSelectQuery($sqlQuery);
		return $result;
	}
	public  function getItemAnd($id , $id2)
	{
		throw new Exception("not implemented question::getItemAnd");
	}
	public  function updateItemValue($id , $id2 , $id3)
	{
		throw new Exception("not implemented question::updateItemValue");
	}
	public  function getItemValue($id , $id2)
	{
		throw new Exception("not implemented question::getItemValue");
	}
	
	
	//delete questions	
	public function deleteItem($id) 
	{
		$sqlQuery ="DELETE FROM medicalrecords";
		$sqlQuery .=" WHERE questionid =$id";
		$result =$this ->getDbManager()->executeQuery($sqlQuery);
		return $result;
	}
	//To get a list of all questions
	public function getItem($id)
	{
		$sqlQuery ="SELECT * ";
		$sqlQuery .="FROM medicalrecords";
		$sqlQuery .="  WHERE questionid=$id";
		$result =$this->getDbManager()->executeSelectQuery($sqlQuery);
		return $result;
	}
	
	public function insertItemArray($parameters)
	{
		//INSERT INTO `medicalrecords`(`questions`, `unasigned1`, `unasigned2`, `unasigned3`) VALUES ('questyuiuo',1,2,3)
		$question =  $parameters["question"];
		$sqlQuery = "INSERT INTO medicalrecords (questions)";
		$sqlQuery .=" VALUES('$question');";
		//echo $sqlQuery;
		$result =$this->getDbManager()->executeQuery($sqlQuery);
		return $result;
		
		
	}
	public function updateItemArray($questionid , $parameters)
	{
		
		$question =  $parameters["question"];
		$sqlQuery ="UPDATE medicalrecords SET questionid='$question'";
		$sqlQuery .= " WHERE questionid=$questionid";
		$result =$this->getDbManager()->executeQuery($sqlQuery);
		return $result;
	}
	
	
	//only for unit testing ... 
	public function getLast()
	{
		$sqlQuery= "SELECT MAX(questionid) as maxid FROM medicalrecords;";
		$result = $this ->getDbManager()->executeSelectQuery($sqlQuery);
		return ($result[0]["maxid"]) ? $result[0]["maxid"] : -1 ;
	}
	

}
?>