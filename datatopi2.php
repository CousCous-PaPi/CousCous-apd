<?php
    $server='srv421567.hstgr.cloud';
    $user='21v_danielv';
    $password='wmywxj';
    $database='21v_danielv_apd';
    $mysqli= new mysqli($server, $user, $password, $database);
    $sql = "select * from tijden, update_admin";
    //print("<form name='jemoeder' action='http://172.17.14.175/get_data.php' method='post'>");
    $result = $mysqli->query($sql);
	$i = 1;
    $row=$result->fetch_assoc();
	$datum = $row['laatst_bijvul'];
	print("$datum ");
	
	$tijd = $row['Toedieningstijd'];
    print("$tijd ");
	while ($row=$result->fetch_assoc()){
      $tijd = $row['Toedieningstijd'];
      //strtotime($tijd);
      
      //print ("<input type='hidden' name='$i' value='$tijd'>");
      print("$tijd ");
      $i++;
      
    }
    //print ("<input type='hidden' value='ja' name='ja'>");
    //print ("</form>");
    ?>

