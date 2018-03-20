<?php

include("conn.php");

if(isset($_POST['reg']))
{
	if(!empty($_POST['Ime']) && !empty($_POST['Prezime']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['pass2']))
	{
		$ime 			 = $_POST['Ime'];
		$prezime 		 = $_POST['Prezime'];
		$email			 = $_POST['email'];
		$password 		 = $_POST['pass'];
		$password 		 = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
		$password2		 = $_POST['pass2'];
		$aktivacijskiKod = rand(1000, 9999);

		$sql = "SELECT * FROM korisnici WHERE email=?";
		$spremna = $conn->prepare($sql);
		$spremna->bind_param('s', $email);
		$spremna->execute();
		$imaLiGa = $spremna->fetch();

		if($imaLiGa)
		{
			header("location:index.php?poruka=Mejl je vec u upotrebi");
		}
		else{
			$sql = "INSERT INTO korisnici (ime, prezime, email, password, aktivacijskiKod) VALUES (?, ?, ?, ?, ?)";
			$spremna2 = $conn->prepare($sql);
			$spremna2->bind_param('ssssi', $ime, $prezime, $email, $password, $aktivacijskiKod);
			$spremna2->execute();
			$spremna2->close();


			$to      = $email;
			$subject = 'dokle.ba - aktivacijski kod';
			$message = $aktivacijskiKod;
			$headers = 'From: hahu123@dokle.ba' . "\r\n" .
			    'Reply-To: info@dokle.ba' . "\r\n" .
			    'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers);

			$_SESSION['email'] = $email;
			//echo "<a href='aktiviraj.php'>Aktiviraj se</a>";
			header("location:aktiviraj.php");
		}
	}
	else
	{
		header("location:index.php?poruka=Unesite sva polja");
	}
}
else 
{
	header("location:index.php?poruka=Kardinalna greska!");
}

?>