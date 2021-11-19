<?php
	session_start();
	$_SESSION['numeutilizator']=$_POST["numeutilizator"];
	$_SESSION['parola']=$_POST["parola1"];
	$parola2=$_POST["parola2"];
	$email=$_POST["email"];
	$b=mysqli_connect( "localhost", "root",'',"inchirieriauto");
    if (mysqli_connect_errno()) {
		exit('Connect failed: '. mysqli_connect_error());
	}
	
	if($_SESSION['parola']!=$parola2)
		echo 'Parola1 tebuie sa fie egala cu Parola2';
	else 
	{
	
	$com="SELECT * FROM `utilizatori`";

	$info=$b->query($com);
	if($info->num_rows > 0)
	{
		$a=0;
		while($row=$info->fetch_assoc())
		{
			if($row['Nume']==$_SESSION['numeutilizator'])
				$a=1;
		}
		if($a==1)
			echo 'Numele de utilizator este luat';
		
	}
		if($a==0)
		{
			if(strlen($email)<5)
				echo 'Adresa de email este invalida';
			else
			{
				$utilizator="Insert into `utilizatori` (Nume,Parola,email) values ('".$_SESSION['numeutilizator']."','".$_SESSION['parola']."','".$email."')"; 
				if(mysqli_query($b,$utilizator))
					 header("Location: ./paginaP.html");
				 else
					 echo "Datele nu au putut fi adaugate ". mysqli_errno($b). " : ". mysqli_error($b);
			}
		}
	
	}
	$b->close();
?>