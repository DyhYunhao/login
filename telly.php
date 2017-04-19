<?php
   	$serverName = "localhost";
   $userName = "root";
   $passWord = "";
   $databaseName = "yonghu";
   try{
     $conn = new PDO("mysql:host=$serverName;dbname=$databaseName",$userName,$passWord);
   }
   catch (Exception $e) {
      exit($e->getMessage());
    }
$perNumber=2; 
$page=$_GET['page']; 
$count=$conn->query("select count(*) from uname"); 
$rs=$count->fetch(); 
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber); 
if (!isset($page)||$page<=0) {
   $page=1;
} 
$startCount=($page-1)*$perNumber;
$result=$conn->query("select * from uname limit $startCount,$perNumber"); 
   
echo "<table border='1'>";
echo "<tr>";
echo "<th>name</th>";
echo "<th>psd</th>";
echo "</tr>";
while ($row=$result->fetch()) {
echo "<tr>";
   echo "<td>$row[0]</td>"; 
   echo "<td>$row[1]</td>";
echo "</tr>";
}
echo "</table>";
   
if ($page != 1) { 
?>
<a href="telly.php?page=<?php echo $page - 1;?>">上一页</a> 
<?php
}
for ($i=1;$i<=$totalPage;$i++) {  
?>
<a href="telly.php?page=<?php echo $i;?>"><?php echo $i ;?></a>
<?php
}
if ($page<$totalPage) { 
?>
<a href="telly.php?page=<?php echo $page + 1;?>">下一页</a>
<?php
} 
?>