<?php

include("conn.php");

if (isset($_POST['login']))
{
	$email 		= $_POST['emailLogin'];
	$password 	= $_POST['passLogin'];

	if ($email && $password) 
	{
		$sql = "SELECT id, password, aktivan FROM korisnici WHERE email=?";		
		$priprema = $conn->prepare($sql);
		$priprema->bind_param("s", $email);
		$priprema->execute();
		$priprema->bind_result($id, $bazniPassword, $aktivan);

		if($priprema->fetch())
		{
			$password = password_verify($password, $bazniPassword);
			if($password == $bazniPassword && $aktivan == "jeste")
			{
				$_SESSION['id']	= $id;
				header("location:profil.php?id=".$id);
			}
			else
			{
				header("location:login.php?poruka=Netacan password ili neaktivan mejl");
			}
		}
		else
		{
			header("location:login.php?poruka=Dati mejl ne postoji !");
		}
	}
	else 
	{
		header("location:login.php?poruka=Unesi mail i password");
	}
}

?>