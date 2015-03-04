<?
global $db;

try
{
    $dir = 'sqlite:/var/www/db/yentl';
    $db = new PDO( $dir );
}
catch( PDOexception $e )
{
    error_log( $e );
}

$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

