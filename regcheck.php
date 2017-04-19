<?php  
     
        $user = $_POST['username'];  
        $psw = $_POST['passwd'];  
		$server = "localhost";
	    $username = "root";
	    $password = "";
	    $databaseName = "yonghu";
		
        $psw_confirm = $_POST["confirm"];  
		
        if($user == "" || $psw == "" || $psw_confirm == "")  
        {  
            echo "<script>alert('请确认信息完整性！'); window.history.back()</script>";  
        }  
        else  
        {  
            if($psw == $psw_confirm)  
            {
            	$conn = new PDO("mysql:host=$server;
            	dbname=$databaseName",$username,$password);            
                $query = $conn->prepare($sql);  
	        $row = $conn->exec("insert into uname (name,psd) values('$user','$psw')");    
                    if($row == 1)  
                    {  
                        echo "<script>alert('注册成功！'); window.history.back();</script>";  
                    } 
					 else  
                   {  
                      echo "<script>alert('注册失败！'); window.history.back();</script>";  
                   }    
		 	}                 
            else  
            {  
                echo "<script>alert('注册失败！'); window.history.back();</script>";  
            }  
          
           
        }  
?>  