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
		if($a==1)
		{
			$d=date("Y/m/d h:i");
			$inchiriere="Insert into `incirieri` (NumePersoana,NumeMasina,Data) values ('".$_SESSION['numeutilizator']."','".$marca." ".$num."','".$d."')";
			if(mysqli_query($b,$inchiriere))
				echo "Date adaugate";
			else
				echo "Proces esuat";
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