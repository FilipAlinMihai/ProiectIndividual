<?php
	echo "<h2>Masinile disponibile</h2>";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `masini`"; 
	

	$info = $b->query($com);
	if ($info->num_rows > 0) {
	echo "<ul>";
	while($row = $info->fetch_assoc()) {
		echo '<li><p style="font-size:18"> Nume: '. $row['NumeMasina']. ' -- Producator : '. $row['Producator']. ' -- Tip: '. $row['Tip'].' -- Pret: '.$row['Pret']."</p></li>";
	}
	echo "</ul>";
	echo '<br><a href="paginaP.html"><button>Pagina Principală</button></a>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	$b->close();


?>