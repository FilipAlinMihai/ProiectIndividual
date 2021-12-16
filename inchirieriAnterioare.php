<?php
	session_start();
	echo "<h2>Masinile inchiriate in trecut</h2>";
	echo "<style> body {  background-color: #DCDCDC;} </style>";
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `inchirieri`";
	$info=$b->query($com);
	
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['NumePersoana']==$_SESSION['numeutilizator'])
			{
				echo "<p style='font-size:130%'>"."A fost inchiriata masina : ".$row['NumeMasina']." in data de ".$row['Data']." </p>";
				$a=1;
			}
		}
		
		if($a==0)
		{
		
			echo "Nu au fost gasite inchirieri anterioare ";
		}
	}
	else
	{
		
		echo "Nu au fost gasite inchirieri anterioare ";
	}
	echo '<br><a href="paginaP.html"><button>Pagina Principală</button></a>';
	$b->close();
?>