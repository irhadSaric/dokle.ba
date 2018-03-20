<?php
	include 'conn.php';
	include 'header.php';
?>

<script>

function submitChat(idPrimaoca, idPosiljaoca) {
	if(form1.msg.value == '') {
		alert("Ne možete poslati praznu poruku");
		return;
	}
	var msg = form1.msg.value;
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.open('GET','slanjePoruke.php?idPrimaoca='+idPrimaoca+'&sadrzaj='+msg,true);
	xmlhttp.send();
	form1.msg.value='';
}

function baciSeen(idPrimaoca, idPosiljaoca)
{
	var xmlhttp = new XMLHttpRequest();

	xmlhttp.open('GET', 'baciSeen.php?idPrimaoca='+idPrimaoca+'&idPosiljaoca='+idPosiljaoca, true);
	xmlhttp.send();
}

$(document).ready(function(e){
	$.ajaxSetup({
		cache: false
	});
	var stranica = 'listanjePoruka.php?idPrimaoca=';
	var ja = "<?php echo $_SESSION['id']; ?>";
	var on = "<?php echo $_GET['idPrimaoca']; ?>";
	stranica += ja;
	stranica += "&idPosiljaoca=";
	stranica += on;
	setInterval( function(){ $('#chatlogs').load(stranica); }, 2000 );
});

</script>
<br><br><br>

<div id="chatlogs" style="height: 400px; width: 400px; margin: 0 auto; border: 1px solid black; overflow-y: scroll; margin-top: 50px; position: relative; word-wrap: break-word; white-space: -moz-pre-wrap; white-space: pre-wrap;">
	<img src="loader.gif" height="50px" width="50px"></img>
</div>
<div style="margin:20px auto; width: 400px; height: 50px; margin-bottom: 20px;">
	<form name="form1">
		<textarea id="input1" name="msg" placeholder="Text poruke" onclick="baciSeen(<?php echo $_SESSION['id'].",".$_GET['idPrimaoca'];?>);" style="width: 100%; overflow-x: hidden;"></textarea><br />
		<input type='button' onclick="submitChat(<?php echo $_GET['idPrimaoca'].",".$_SESSION['id']; ?>)" style="width: 400px; height: 25px; border: 1px solid black;" value="SEND"></input><br /><br />
	</form>
</div>
<br />
<br>
<?php
	include 'footer.php'
?>