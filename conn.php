<?php

$db_host 	= "localhost";
$db_name	= "korisnici";//"id3608535_korisnici";
$db_pass	= "";//"dokle.ba";
$db_user	= "root";//"id3608535_irho";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
$conn->set_charset('utf8');
session_start();

/*
$db_host 	= "localhost";
$db_name	= "id3608535_korisnici";//"korisnici";
$db_pass	= "dokle.ba";//"";
$db_user	= "id3608535_irho";//"root";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
$conn->set_charset('utf8');
session_start();*/

?>
