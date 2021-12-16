<?php
echo "<h2>Inchirieri Anterioare</h2>";
	echo "<style> body {  background-color: #DCDCDC;} </style>";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `inchirieri`"; 
	

	$info = $b->query($com);
	if ($info->num_rows > 0) {
	echo "<ul>";
	while($row = $info->fetch_assoc()) {
		echo '<li><p style="font-size:18"> Nume Client: '. $row['NumePersoana']. ' -- Nume Masina : '. $row['NumeMasina']. ' -- Data: '. $row['Data']."</p></li>";
	}
	echo "</ul>";
	echo '<br><a href="gestionareMasini.html"><button>Pagina Principală</button></a>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	$b->close();

?>