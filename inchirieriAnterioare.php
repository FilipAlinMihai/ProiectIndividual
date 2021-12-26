<?php
	session_start();
	echo "<h2>Masinile inchiriate in trecut</h2>";
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
				echo "<p style='font-size:130%'>"."A fost inchiriata masina : ".$row['NumeMasina']." in data de ".$row['Data']." iar inchirierea are statutul ".$row['Statut']." cu Nota ".$row['Nota']." si Codul ".$row['Cod']."</p>";
				$a=1;
			}
			
			if(strcasecmp($row['Statut'],"Admis")==0 && $row['Nota']==0)
			{
			echo '	<div class="center">
			<p style="font-size: 130%">Acordati o nota</p>
			<form action="Notare.php" method="post" class="formular">
			<table >
			<tr>  <td style="font-size:120%">Numele Masinii</td> <td><input type="text"  name="masina"/></td> <tr>
			<tr>  <td style="font-size:120%">Producatorul</td> <td><input type="text"  name="prod"/></td> <tr>
			<tr>  <td style="font-size:120%">Nota</td> <td><input type="number"  name="nota"/></td> <tr>
			<tr>  <td style="font-size:120%">Codul Inchirierii</td> <td><input type="number"  name="cod"/></td> <tr>
			<tr>  <td><input type="submit" ></td> </tr>
			</table>
			</form>
			</div>';
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
	echo '<br><a href="../paginaP.html"><button>Pagina Principală</button></a>';
	$b->close();
?>