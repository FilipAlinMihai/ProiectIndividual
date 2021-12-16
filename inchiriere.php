<?php
	session_start();
	$num=$_POST["numeM"];
	$marca=$_POST["marcaM"];
	
	
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	$com="SELECT * FROM `masini`";
		$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['NumeMasina']==$num && $row['Producator']==$marca)
				$a=1;
		}
		date_default_timezone_set("Europe/Bucharest");
		if($a==1)
		{
			$d=date("Y/m/d ").date("h:i");
			$inchiriere="Insert into `inchirieri` (NumePersoana,NumeMasina,Data) values ('".$_SESSION['numeutilizator']."','".$marca." ".$num."','".$d."')";
			if(mysqli_query($b,$inchiriere))
				echo "Date adaugate";
			else
				echo "Proces esuat". mysqli_errno($b). " : ". mysqli_error($b);
		}
		else
		{
			echo "Masina nu a fost gasita";
		}
	}
	else
	{
		echo "Masina nu a fost gasita";
	}
	$b->close();
?>