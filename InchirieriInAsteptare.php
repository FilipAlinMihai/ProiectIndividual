<?php
echo "<h2>Inchirieri Anterioare</h2>";
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
	$com = "SELECT * FROM `inchirieri`"; 
	

	$info = $b->query($com);
	if ($info->num_rows > 0) {
	echo "<ul>";
	while($row = $info->fetch_assoc()) {
		if(strcasecmp($row['Statut'], 'Asteptare') == 0)
		echo '<li><p style="font-size:18">Codul: '.$row['Cod'].' Nume Client: '. $row['NumePersoana']. ' -- Nume Masina : '. $row['NumeMasina']. ' -- Data: '. $row['Data']." --Status: ".$row['Statut']."</p></li>";
		
	}
	echo "</ul>";
	echo '	<div class="center">
			<form action="decizie.php" method="post" class="formular">
			<table >
			<tr>  <td style="font-size:120%">Codul Incirieri</td> <td><input type="text"  name="codul"/></td> <tr>
			<tr>  <td style="font-size:120%">Decizia</td> <td><input type="text"  name="decizia"/></td> <tr>
			<tr>  <td><input type="submit" ></td> </tr>
			</table>
			</form>
			</div>';
	echo '<br><a href="../gestionareMasini.html"><button style="font-size:120%">Pagina Principală</button></a>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	$b->close();

?>