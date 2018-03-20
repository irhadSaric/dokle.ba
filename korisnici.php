<?php
	include("conn.php");
	include("header.php");

?>

<div id="aktivniKorisnici">
	<?php           
	    $sql = "SELECT * FROM korisnici WHERE aktivan='jeste'";
	    $rez = mysqli_query($conn, $sql);

	    if(mysqli_num_rows($rez) > 0)
	    {
	        while($red = mysqli_fetch_assoc($rez))
	        {
	        	echo "
	        	<div class='kor'>
					<a href='profil.php?id=".$red["id"]."'><img src='".$red["profilna"]."'></img></a>
					<h4>".$red["ime"]."</h4>
				</div>";
	        }
	    }
	?>
</div>

<?php
	include("footer.php");
?>