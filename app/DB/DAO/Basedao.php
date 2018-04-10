<?php
abstract class BaseDAO 
{
		var $dbManager = null;
		var $errordetails;

		function BaseDAO($dbMng) 
		{
			$this ->dbManager =$dbMng;
		}
		function getDbManager() 
		{
			return $this ->dbManager;
		}
		abstract public function isExisting($id);
		abstract public function getItem($id);
		abstract public function getItemAnd($id , $id2);
		abstract public function getAllItems();
		abstract public function insertItemArray($parameters);
		abstract public function updateItemArray($bid_id , $parameters);
		abstract public function deleteItem($id); 
		abstract public function getLast();
		abstract public function getItemValue($id , $id2);
		abstract public function updateItemValue($id , $id2 , $id3);
		abstract public function getSearchForItem($id , $id2);
}
?>