<?php
	echo "<h2>Masinile disponibile</h2>";
	echo "<style> body {  background-color: #DCDCDC;} </style>";
	$b = new mysqli('localhost', 'root', '', 'inchirieriauto');

	if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com = "SELECT * FROM `masini`"; 
	

	$info = $b->query($com);
	if ($info->num_rows > 0) {
	while($row = $info->fetch_assoc()) {
		echo '<img src="../imagini/'.$row['NumeMasina'].$row['Producator'].'.jpg" width="=350" height="200"><br>';
		echo '<p style="font-size:18"> Nume: '. $row['NumeMasina']."</p>";
		echo '<p style="font-size:18"> -- Producator : '. $row['Producator']."</p>";
		echo '<p style="font-size:18"> -- Tip: '. $row['Tip']."</p>";
		echo '<p style="font-size:18"> -- Pret: '.$row['Pret']."</p>";
		echo '<p style="font-size:18"> --Disponibile: '.$row['Numar']."</p>";
		
		$incirieri="select * from note where NumeMasina='".$row['NumeMasina']."' and Producator='".$row['Producator']."'";
		$date=$b->query($incirieri);
		if($date->num_rows > 0)
		{
			$row1 = $date->fetch_assoc();
			echo '<p style="font-size:25"> --Nota: '.round($row1['Nota'],2)."</p>";
			echo '<p style="font-size:18"> --Notata de : '.$row1['NumarNote']." utilizatori</p>";
		}
		else{
			$nr=0;
			$nota=10;
			echo '<p style="font-size:25"> --Nota: '.$nota."</p>";
			echo '<p style="font-size:18"> --Notata de : '.$nr." utilizatori</p>";
		}
	}


	echo '<br><a href="../paginaP.html"><button>Pagina Principală</button></a>';
	}
	else {
	echo 'Nu au fost gasite rezultate';
	}	
	
	$b->close();


?>