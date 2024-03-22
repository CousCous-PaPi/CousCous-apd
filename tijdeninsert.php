<?php
$server='localhost';
$user='21v_danielv';
$password='wmywxj';
$database='21v_danielv_apd';
$mysqli= new mysqli($server, $user, $password, $database);



if (isset($_POST['bijgevuld'])) {  
  
  $date = date("y-m-d");
  for ($i=1; $i<15; $i++) {
  	$dag = "dag".$i;
    $sql1 = "update tijden set toedieningstijd ='".$_POST[$dag]."' where dag = '$i'";
    
    $result=$mysqli->query($sql1);
    
  }          
  $sql = "delete from update_admin";
  
  
  $result=$mysqli->query($sql);
  $sql = "insert into update_admin (laatst_bijvul, laatst_update) values ('$date', '$date')";
  $result=$mysqli->query($sql);
  
} else {
  for ($i=1; $i<15; $i++) {
  	$dag = "dag".$i;
    $sql1 = "update tijden set toedieningstijd ='".$_POST[$dag]."' where dag = '$i'";
    
    $result=$mysqli->query($sql1);
    
  }     
  $date = date("y-m-d");
  $sql= "select * from update_admin";
  $result= $mysqli->query($sql);
  $row = $result->fetch_assoc();
  $bijvul = $row['laatst_bijvul'];
  $sql= "update update_admin set laatst_update = '$date' where laatst_bijvul = '$bijvul'";
  $result= $mysqli->query($sql);
}
//include 'datatopi.php';




//terug naar site
header('refresh: 1.5; index.php');
exit;
?>



