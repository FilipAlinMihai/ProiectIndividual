<?php
	echo "<h2>Masinile disponibile</h2>";
	echo "<style> body {  background-color: #DCDCDC;} 
	.center {
	
	margin: auto;
	width: 50%;
	padding: 15px;
	border:3px solid #73AD21
  
					}
	div{
	box-shadow: 10px 10px;
	}
	.formular{
	border:3px solid #00BFFF
	}	</style>";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `masini`"; 
	

	$info = $b->query($com);
	if ($info->num_rows > 0) {
	echo "<ul>";
	while($row = $info->fetch_assoc()) {
		echo '<li><p style="font-size:18"> Nume: '. $row['NumeMasina']. ' -- Producator : '. $row['Producator']. ' -- Tip: '. $row['Tip'].' -- Pret: '.$row['Pret'].' --Disponibile: '.$row['Numar']."</p></li>";
	}
	echo "</ul>";
	echo '<br><a href="../gestionareMasini.html"><button>Pagina Principală</button></a>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	
	$b->close();
	echo '	<div class="center">
			<p style="font-size: 130%">Modificati numarul de masini disponibile</p>
			<form action="NumarMasini.php" method="post" class="formular">
			<table >
			<tr>  <td style="font-size:120%">Numele Masinii</td> <td><input type="text"  name="masina"/></td> <tr>
			<tr>  <td style="font-size:120%">Producatorul</td> <td><input type="text"  name="prod"/></td> <tr>
			<tr>  <td style="font-size:120%">Disponibile</td> <td><input type="number"  name="disp"/></td> <tr>
			<tr>  <td><input type="submit" ></td> </tr>
			</table>
			</form>
			</div>';

?>