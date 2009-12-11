<?php

$id = $_GET['id'];

switch ($_GET['cmd']) {
    case "pre":
        pre( $id );
        break;
    case "post":
        post( $id );
        break;
}

header("location: index.php");
exit;

function pre( $id )
{
    if (!$link = mysql_connect('localhost', 'root', 'dellelinux')) { echo 'Could not connect to mysql'; exit; }
    if (!mysql_select_db('sms', $link)) { echo 'Could not select database'; exit; }

    $sql = "SELECT `time` FROM sms WHERE `id` = '$id'";
    $result = mysql_query($sql, $link);

    if (!$result) { echo "DB Error, could not query the database\n"; echo 'MySQL Error: ' . mysql_error(); exit; }
    
    $out = mysql_fetch_assoc( $result );
    if ( strlen( $out['time'] ) > 0 )
    {
        $actualtime = strtotime( $out['time'] );
        $time = date( "Y-m-d H:i:s", $actualtime - 1 );
        mysql_query("UPDATE sms SET `time` = '$time' WHERE `id` = '$id'", $link);
    }
    mysql_free_result($result);
}

function post( $id )
{
    if (!$link = mysql_connect('localhost', 'root', 'dellelinux')) { echo 'Could not connect to mysql'; exit; }
    if (!mysql_select_db('sms', $link)) { echo 'Could not select database'; exit; }

    $sql = "SELECT `time` FROM sms WHERE `id` = '$id'";
    $result = mysql_query($sql, $link);

    if (!$result) { echo "DB Error, could not query the database\n"; echo 'MySQL Error: ' . mysql_error(); exit; }
    
    $out = mysql_fetch_assoc( $result );
    if ( strlen( $out['time'] ) > 0 )
    {
        $actualtime = strtotime( $out['time'] );
        $time = date( "Y-m-d H:i:s", $actualtime + 1 );
        mysql_query("UPDATE sms SET `time` = '$time' WHERE `id` = '$id'", $link);
    }
    mysql_free_result($result);
}

?>