<?php session_start(); ?>
<html>
  <head>
		<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,100' rel='stylesheet' type='text/css'>
      <title>Dokter website;)</title>
      <link rel="shortcut icon" type="image/png" href="images/pil.png"/>
		<link href="style.css" rel="stylesheet">
    <script src="my-project.js"></script>
</head>
  <body>
<nav>
		

	</nav>
   
  		<div class="container">
  			<div class="text">
              
         
	  			<div id="main-text" class="text">
					<h1>Automatische Pillen Dispenser</h1>
                  
					<h2>Programmeren</h2><br>
                
					
		  	
  		</div>	
          </div>
         </div>
    <?php 
      print (
      "<div class='container2'>
      <div class='text2'>
      	");
      	$date = date("y-m-d");
    	$server='localhost';
        $user='21v_danielv';
        $password='wmywxj';
        $database='21v_danielv_apd';
        $mysqli= new mysqli($server, $user, $password, $database);
    	$sql = "select * from tijden";
        $result = $mysqli->query($sql);
        $sql1 = "select * from update_admin";
    	$result1 = $mysqli->query($sql1);
    	$row1 = $result1->fetch_assoc();
    	$date1 = date_create($row1['laatst_bijvul']);
    	$date = date_create($date);
    	
    	$huidigedag = date_diff($date1, $date);
    	$dezedag = $huidigedag->format("%a");
    	if ($dezedag>14){
          $dezedag = 'De dispenser is leeg, vul aub eerst bij';
        }
    	print( 
          "<h3>Huidige dag: $dezedag<h4>Pas hieronder de innametijden aan</h4>
          <form name='tijdentabel' action='tijdeninsert.php' method='post'><br>De dispenser is opnieuw bijgevuld<input type='checkbox' name='bijgevuld'><br>
          		");
    	while ($row=$result->fetch_assoc()){
        print("
        Dag ".$row['dag'].": 
        <input type='time' name='dag".$row['dag']."' value='".$row['Toedieningstijd']."'><br>
        ");  
        }
    	print("<input type='submit'></form>");
   
    
    print ("</div>");
      
?>
</body>
</html>