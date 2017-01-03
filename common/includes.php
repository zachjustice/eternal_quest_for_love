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

function add_to_map_if_set( &$new_map, $old_map, $key )
{
    if( !is_array( $new_map ) || !is_array( $old_map ) )
    {
        return false;
    }

    if( !isset( $old_map[ $key ] ) )
    {
        return false;
    }

    $new_map[ $key ] = $old_map[ $key ];

    return true;
}

function add_to_map_if_positive_integer( &$new_map, $old_map, $key )
{
    if( !is_array( $new_map ) || !is_array( $old_map ) )
    {
        return false;
    }

    if( !isset( $old_map[ $key ] ) )
    {
        return false;
    }

    if( !is_int( $old_map[ $key ] ) && $old_map[ $key ] < 0 )
    {
        return false;
    }

    $new_map[ $key ] = $old_map[ $key ];

    return true;
}

function return_failure( $message )
{
    return json_encode( array( 'message' => $message, 'success' => false ) );
}

function return_success( $message )
{
    error_log( "return success" );
    echo json_encode( array( 'message' => $message, 'success' => true ) );
    return;
}

function debug_dump( $object=null ){
    ob_start();
    var_dump( $object );
    $contents = ob_get_contents();
    ob_end_clean();
    error_log( $contents );
}

?>
