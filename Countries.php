
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css"type="text/css"/>
       
       
	</head>
			<body>
			<?php
    $db=new mysqli('localhost', 'root', '', "countries-name");
	if(mysqli_connect_errno()){
		printf("Error connect to DB:%S\n",mysqli_error($db));
		exit();
								}
		$query1="SELECT Name_cities FROM `cities` WHERE `Name_region`='Kyivska'";
		$query2="SELECT Name_region FROM `regions` WHERE `Name_country`='Ukraine'";
		$query3="SELECT Name_country FROM `countries`";
		$res1 = mysqli_query($db, $query1);
		$result1= mysqli_fetch_all($res1, MYSQLI_ASSOC);
		$city0 = array();
		$city1 = array();
		$city2 = array();
		$city0=$result1[0];
		$city1=$result1[1];
		$city2=$result1[2];
		
		$town0=$city0["Name_cities"];
		$town1=$city1["Name_cities"];
		$town2=$city2["Name_cities"];
		
		
		$res2 = mysqli_query($db, $query2);
		$result2= mysqli_fetch_all($res2, MYSQLI_ASSOC);
		$region0 = array();
		$region1 = array();
		$region0=$result2[0];
		$region1=$result2[1];
		$rehion0=$region0["Name_region"];
		$rehion1=$region1["Name_region"];
		
		$res3 = mysqli_query($db, $query3);
		$result3= mysqli_fetch_all($res3, MYSQLI_ASSOC);
		$country0 = array();
		$country1 = array();
		$country0=$result3[0];
		$country1=$result3[1];
		$countryres0=$country0["Name_country"];
		$countryres1=$country1["Name_country"];
		
		
		
				?>
 <form action="Countries.php" method="post">
 
 <select name="country" id="menu1" onchange="changeRegion()">
	  <option  value="<?php echo htmlspecialchars($countryres0);?>"><?php echo $countryres0;?></option>
	  <option  value="<?php echo htmlspecialchars($countryres1);?>"><?php echo $countryres1;?></option>
  
</select></p>
<select name="region" id="menu2" onchange="changeCity()">
	  <option  class="region" value="" text=""></option>
	  <option  class="region" value=""></option>
  
</select></p>
<select name="city" id="menu3">
	  <option class="city" value=""></option>
	  <option class="city" value=""></option>
	  <option class="city" value=""></option>
</select></p>
   <p><input type="submit" value="Отправить"></p>
  </form>
   <table border="1" width="100%" cellpadding="5">
	   <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	   </tr>
	   <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	   </tr>
	   <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	   </tr>
	   <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	   </tr>
	   <tr>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
		<th></th>
	  </tr>
 </table>
 <?php
 
 if(!empty($_POST['country'])){print_r((string)$_POST['country']);}

if(!empty($_POST['region'])){print_r($_POST['region']);}

if(!empty($_POST['city'])){print_r($_POST['city']);}

?>

		  <script  type="text/javascript">
		 
function changeRegion(){		 
var select = document.querySelector('#menu1').getElementsByTagName('option');
var region= document.getElementsByClassName('region');

  for (var i = 0; i < select.length; i++) {
	if ((select[i].value === 'Ukraine')&&(select[i].selected == true)){
	 region[0].value="<?php echo htmlspecialchars($rehion0);?>";
	 region[1].value="<?php echo htmlspecialchars($rehion1);?>";
	 region[0].text="<?php echo $rehion0;?>";
	 region[1].text="<?php echo $rehion1;?>";
																	} else if((select[i].value === 'Russia')&&(select[i].selected == true)){
																		var selRuss="Russia is selected";
																			console.log(selRuss);
																																					}
						}
}
function changeCity(){
	var selectreg = document.querySelector('#menu2').getElementsByTagName('option');
	var city=document.getElementsByClassName('city');
			for (var i = 0; i < selectreg.length; i++) {
				if ((selectreg[i].value === 'Kyivska')&& (selectreg[i].selected == true)){										
					city[0].value="<?php echo htmlspecialchars($town0);?>";
					city[1].value="<?php echo htmlspecialchars($town1);?>";
					city[2].value="<?php echo htmlspecialchars($town2);?>";
					city[0].text="<?php echo $town0;?>";
					city[1].text="<?php echo $town1;?>";
					city[2].text="<?php echo $town2;?>";
																						}else if((selectreg[i].value === 'Donetska')&&(selectreg[i].selected == true)){
																						var selDon="Donetska is selected";
																					console.log(selDon);	
																						}
														}
						}
			</script> 
		
  
	</body>		
</html>