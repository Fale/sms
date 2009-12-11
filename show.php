<?php
require "settings.php";

if ( !$link = mysql_connect( $host, $user, $pass ) ) { echo 'Could not connect to mysql'; exit; }
if ( !mysql_select_db( $db, $link ) ) { echo 'Could not select database'; exit; }
if ( !$result = mysql_query( sql(), $link ) ) { echo 'MySQL Error: ' . mysql_error(); exit; }

echo "<table width=100% border=1>";
while ( $row = mysql_fetch_assoc( $result ) )
{
    echo "<tr>";
    echo "<td>" . contacts( $row['sender'] ) . "</td>";
    echo "<td>" . contacts( $row['receiver'] ) . "</td>";
    echo "<td>" . date( "j/n/y H:i", strtotime( $row['time'] ) ) . "</td>";
    //echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . mb_convert_encoding( urldecode( $row['message'] ), "ISO-8859-1", "UTF-8" ) . "</td>";
    echo "</tr>";
}
echo "</table>";

mysql_free_result( $result );

function sql()
{
    require "settings.php";
    if ( $_GET['first'] && $_GET['second'] )
    {
        $first = '\+' . $_GET['first'];
        $second = '\+' . $_GET['second'];
        $since = $_GET['since'];
        $to = $_GET['to'];
        $with = $first . $second . $since . $to . $cook;
 /*       echo $with . "<br>";
        echo $_GET['token'] . "<br>";
        echo md5( $with ) . "<br>";*/
        if( $_GET['token'] == md5( $with ) )
        {
            $sql = "SELECT * FROM sms WHERE ( `sender` = '$first' OR `receiver` = '$first' ) AND ( `sender` = '$second' OR `receiver` = '$second' ) AND ( `time` BETWEEN '$since' AND '$to' ) ORDER BY time ASC";
            $done = 1;
        }
        elseif( $_GET['all'] && $_GET['token'] == md5( $cook . $cook ) )
            $sql = 'SELECT * FROM sms ORDER BY time ASC';
        else
            $sql = "SELECT * FROM sms WHERE `sender` = '' AND `receiver` = ''";
    } 
    return $sql;
}

function contacts( $num )
{
    require "settings.php";
    if ( !$link = mysql_connect( $host, $user, $pass ) ) { echo 'Could not connect to mysql'; exit; }
    if ( !mysql_select_db( $db, $link ) ) { echo 'Could not select database'; exit; }

    $result = mysql_query( "SELECT `person` FROM `contacts` WHERE `number`= '$num'", $link );
    $out = mysql_fetch_assoc($result);
    if ( strlen( $out['person'] ) > 0 )
        return $out['person'];
    else
        return $num;
    mysql_free_result( $result );
}
?>
