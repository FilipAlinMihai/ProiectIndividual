<?php
	$masina=$_POST["masina"];
	echo "<h2>Rezultatele Cautarii</h2>";
	echo "<style> body {  background-color: #DCDCDC;} </style>";
	
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `masini`"; 
	
	$info = $b->query($com);
	$a=0;
	if ($info->num_rows > 0) {
	
	while($row = $info->fetch_assoc()) {
		if(strcasecmp($masina, $row['NumeMasina']) == 0)
		{
			$a=1;
			echo '<p style="font-size:18"> Nume: '. $row['NumeMasina']. ' -- Producator : '. $row['Producator']. ' -- Tip: '. $row['Tip'].' -- Pret: '.$row['Pret']."</p>";
		}
	}
	if($a==0)
		echo 'Nu au fost gasite rezultate';
	}
	else 
	{
		echo 'Nu au fost gasite rezultate';
	}	
	echo '<br><a href="../gestionareMasini.html"><button>Pagina Principală</button></a>';
	$b->close();
?>