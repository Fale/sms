<?php

# Set these variables
$phone = "+393283799681";
$file = "file.csv";

# Do not touch the code behind this line

$var = file_get_contents( $file );
$var = explode( "\n", $var );
$fh = fopen( "sms.sql", 'a') or die( "can't open file" );

foreach ( $var as $line=>$data )
{
    if ( preg_match( "/(.*)\;(.*);\"(.*)\";\"(.*)\";(.*);\"(.*)\";(.*);\"(.*)\"/", $data, $matches ) )
    {
        $matches[6] = str_replace( '.', '-', $matches[6] );
        $sql = "(NULL, ";
        if ( strlen( $matches[3] > 0 ) )
            $sql .= "'" . $matches[3] . "', "; 
        else 
            $sql .= "'$phone', ";
        if ( strlen( $matches[4] > 0 ) )
            $sql .= "'" . $matches[4] . "', ";
        else 
            $sql .= "'$phone', ";
        $sql .= "'" . $matches[6] . ":00', ";
        $sql .= "'" . urlencode( $matches[8] ) . "'),\n";
        fwrite( $fh, $sql );
    }
    else
    {
	echo ( $line + 1 . ' ERROR' );
    }
}  

fclose($fh);

?>