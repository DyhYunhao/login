<?php
	class dbname extends PDO{
		public $serverName;
	    public $userName;
	    public $passWord;
	    public $databaseName;
		public $sql;
		public function __construct($serverName,$userName,$passWord,$databaseName){
			$this->serverName = $serverName;
            $this->databaseName = $databaseName;
            $this->userName = $userName;
            $this->passWord = $passWord;
			
		 try{
		  parent::__construct("mysql:host=$serverName;dbname=$databaseName",
			                     $userName,$passWord);
		 }
		 catch(PDOException $e){
		 	echo $e->getMessage();
		 }
								 
		}
		public function drop($table){
         $sql = 'DROP TABLE '.$table.';';
         $re = $this->query($sql);
          if($re){
            echo "删除成功！";
			return TRUE;
          }else{
            echo "无此数据表！";
			return FALSE;
          }
        }
		public function select($table,$name,$Conditionsname,$Conditionsvalue=null){
          if($Conditionsvalue!=null){
            $sql = "SELECT ".$name." FROM ".$table." WHERE ".$Conditionsname."='".$Conditionsvalue."';";
            $re = $this->query($sql);
            $row = $re->fetchAll(PDO::FETCH_ASSOC);
            return $row;
		  }
        }
		public function delete($table,$Conditionsname,$Conditionsvalue=null){
          if($Conditionsvalue!=null){
            $sql = "DELETE FROM ".$table." WHERE ".$Conditionsname."='".$Conditionsvalue."';";
          }
          $re = $this->query($sql);
          if($re){
            echo "删除成功！";
			  return TRUE;
          }else{
            echo "删除失败！";
			return FALSE;
		  }
	    }   
	    public function update($table,$name,$value,$Conditionsname,$Conditionsvalue=null){
          if($Conditionsvalue!=null){
            $sql = "UPDATE ".$table." SET ".$name."= '".$value."' WHERE ".$Conditionsname."='".$Conditionsvalue."';";
          }
          $re = $this->query($sql);
          if($re){
            echo "修改成功！";
			 return true;
          }else{
            echo "修改失败！";
			return false;
          }
        } 
		public function insert($table,$name,$value=null){
          $sql = "INSERT INTO ".$table.'(';
          if($value == null){
            $arrname = array_keys($name);
            $arrvalue = array_values($name);
          }else{
            $arrname = explode('|', $name);
            $arrvalue = explode('|', $value);
          }
          for($i=0;$i<count($arrname);$i++){
            if($i==count($arrname)-1){
                $sql = $sql.$arrname[$i];
            }else{
                $sql = $sql.$arrname[$i].",";
            }
          }
          $sql = $sql.")VALUES(";
          for($i=0;$i<count($arrvalue);$i++){
            if($i==count($arrvalue)-1){
                $sql = $sql."'".$arrvalue[$i]."'";
            }else{
                $sql = $sql."'".$arrvalue[$i]."',";
            }
          }
          $sql .=");";
          $re = $this->query($sql);
          if($re){
            echo "插入成功！";
			return true;
          }else{
            echo "插入失败！";
			return FALSE;
          }
        }
		
}
