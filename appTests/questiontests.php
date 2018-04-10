<?php
require_once("../simpletest/autorun.php");
require_once(dirname(__FILE__) . '/../'  . "/app/db/DAO_factory.php");



class userSQLTests extends UnitTestCase
{
	
		private $userDAO , $DAO_Factory;
		
		private $insertedid; //last value index for the inserting of a property so we can test the delete , update , of this item
			
		public function setUp(){
			
			$this->DAO_Factory = new DAO_Factory();
			$this->DAO_Factory->initDBResources();
			$this->questionDAO =$this->DAO_Factory->getQuestionDAO();
		}
		//add a item into the property database table
		public function testinsertItemArray()
		{
			
			$parameters["questionid"] = "1";	
			$parameters["question"] = "gareth";
			
					
		 	$this->assertTrue($this->questionDAO->insertItemArray($parameters));
		 	$this->insertedid = $this->questionDAO->getLast();
		  	echo "item no is " . $this->insertedid;
		 	
		 	$this->assertTrue($this->questionDAO->isExisting($this->insertedid ));
		  	
		  	//compare the writen results by reading back from the database
		  	$compare = $this->questionDAO->getItem($this->insertedid);
		 	//$this->compareArrays($compare , $parameters);
		  	

		}
		public function testinsertItemArray2()
		{
			
			$parameters["questionid"] = "5";	
			$parameters["question"] = "this is question 1";
			
					
		 	$this->assertTrue($this->questionDAO->insertItemArray($parameters));
		 	$this->insertedid = $this->questionDAO->getLast();
		  	echo "item no is " . $this->insertedid;
		 	
		 	$this->assertTrue($this->questionDAO->isExisting($this->insertedid ));
		  	
		  	//compare the writen results by reading back from the database
		  	$compare = $this->questionDAO->getItem($this->insertedid);
		 	//$this->compareArrays($compare , $parameters);
		  	

		}
		
		
		public function testgetAllQuestions()
		{
			$results = $this->questionDAO->getAllItems();
			$this->assertTrue($results);
			echo  count($results) . " Items In Bids  table";
		}
			
		public function testgetItem()
		{
			//$this->assertFalse($this->BidsDAO->getItem("-45"));
		    $this->testgetItemException("abc");
		    $this->testgetItemException("%^45");
			//$this->assertFalse($this->BidsDAO->getItem("100876"));
		}
		private function testgetItemException($str)
		{
			try 
			{
			    $this->questionDAO->getItem($str);
			    $this->fail("Exception was expected.");
			} 
			catch (Exception $e)
			{
			    $this->pass();
			}  
			
		}
		//updateItemArray
		public function testupdateItemArray()
		{
			echo "\n Updateing Item questionid=" . $this->insertedid;
			

			$parameters["question"] = "updateing question";
		
			$this->assertTrue($this->questionDAO->updateItemArray($this->insertedid , $parameters));
		 	$this->assertTrue($this->questionDAO->isExisting($this->insertedid ));
		 	
		 	$compare = $this->questionDAO->getItem($this->insertedid);
		 	
		 	//$this->compareArrays($compare , $parameters);
		}
		
		private function compareArrays($compare , $parameters)
		{
			 //$this->assertEqual($compare["user_id"] , $parameters["user_id"]);
			 $this->assertEqual($compare["question"] , $parameters["question"]);
			
		 }
		///deleteItem
		public function testdeleteItem()
		{
			$this->assertTrue($this->questionDAO->deleteItem($this->insertedid));	
			//try to read it back
			$this->assertFalse($this->questionDAO->getItem($this->insertedid));	
			
		}
		
		public function tearDown(){
				$this ->validation = null;
		}
}
?>