<?php
require "settings.php";

$first = $_GET['first'];
$second = $_GET['second'];
$token = $_GET['token'];
$fromday = $_GET['fromday'];
$frommonth = $_GET['frommonth'];
$fromyear = $_GET['fromyear'];
$fromhour = $_GET['fromhour'];
$fromminute = $_GET['fromminute'];
$today = $_GET['today'];
$tomonth = $_GET['tomonth'];
$toyear = $_GET['toyear'];
$tohour = $_GET['tohour'];
$tominute = $_GET['tominute'];

if ( $token == md5( "\+" . $first . $okie ) )
{
    $since = "$fromyear-$frommonth-$fromday $fromhour:$fromminute:00";
    $to = "$toyear-$tomonth-$today $tohour:$tominute:00";
    $newtoken = md5( "\+" . $first . "\+" . $second . $since . $to . $cook );
    header("location: show.php?first=$first&second=$second&since=$since&to=$to&token=$newtoken");
    exit;
}
else
    echo "something is wrong, try to check the token.";
?>