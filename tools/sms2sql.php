<?php

$var = file_get_contents( "1208inv.csv" );
$var = explode( "\n", $var );
$fh = fopen( "sms.sql", 'a') or die( "can't open file" );

foreach ( $var as $line=>$data )
{
//    echo $data . "\n";
    if ( preg_match( "/(.*)\;(.*);\"(.*)\";\"(.*)\";(.*);\"(.*)\";(.*);\"(.*)\"/", $data, $matches ) )
    {
        $matches[6] = str_replace( '.', '-', $matches[6] );
        $sql = "(NULL, ";
        if ( strlen( $matches[3] > 0 ) )
            $sql .= "'" . $matches[3] . "', "; 
        else 
            $sql .= "'+393283799681', ";
        if ( strlen( $matches[4] > 0 ) )
            $sql .= "'" . $matches[4] . "', ";
        else 
            $sql .= "'+393283799681', ";
        $sql .= "'" . $matches[6] . ":00', ";
        $sql .= "'" . urlencode( $matches[8] ) . "'),\n";
       // echo $sql;
        fwrite( $fh, $sql );
//       print_r($matches);
    }
    else
    {
	echo ( $line . ' ERROR' );
    }
}  

fclose($fh);

?>