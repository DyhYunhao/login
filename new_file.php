<?php
	 require("dbname.php");
	 $db = new dbname("localhost","root","19960115","yonghu");
	 $sql = $db->select("uname",'name',"name","aa");
	 foreach($sql as $value1)
	 {
	 	foreach($value1 as $value2)
		{
			echo $value2." ";
		}
	 }


    ?>