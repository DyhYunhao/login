<?php
        $user = $_POST['username'];  
        $psw = $_POST['password']; 
		$authcode = $_POST['auth']; 
//      $vcode =$_REQUEST['auth'];
		$serverName = "localhost";
	    $userName = "root";
	    $passWord = "";
	    $databaseName = "yonghu";
        if($user == "" || $psw == "" || $authcode == "")  
        {  
            echo "<script>alert('请输入用户名,密码或验证码！');</script>";  
        }  
		else if($_REQUEST['auth'])
		{
			session_start();
			if($_REQUEST['auth']<>$_SESSION['vcode']){
			echo "<script>alert('验证码错误！');window.location = 'login.html'</script>"; 
			}
		}
        
        
        	$conn = new PDO("mysql:host=$serverName;
        	                 dbname=$databaseName",$userName,$passWord);  
       
            $sql = "select name,psd from uname where name = '$_POST[username]' and psd = '$_POST[password]'";  
            $query = $conn->prepare($sql);

            if($query)  
            {  
                echo " hello";
            }  
            else  
            {  
                echo "<script>alert('用户名或密码不正确！');window.history.back()/script>";  
            }  
         
		

?>

