<?

require_once( './includes.php' );
$args = array();

if( !add_to_map_if_set( $args, $_REQUEST, 'email' ) )
{
    return_failure( 'Email is blank.' );  
}

if( !add_to_map_if_set( $args, $_REQUEST, 'age' ) )
{
    return_failure( 'Age is blank.' );  
}

if( !add_to_map_if_set( $args, $_REQUEST, 'name' ) )
{
    return_failure( 'Name is blank.' );  
}

if( !add_to_map_if_set( $args, $_REQUEST, 'music' ) )
{
    return_failure( 'Music is blank.' );  
}

if( !add_to_map_if_set( $args, $_REQUEST, 'gender' ) )
{
    return_failure( 'Music is blank.' );  
}

if( !is_string( $args[ 'email' ] ) )
{
    return_failure( 'Email is not a string.' );
}

if( !is_numeric( $args[ 'age' ] ) )
{
    return_failure( 'Age is not a number.' );
}
else
{
    $args[ 'age' ] = (int) $args[ 'age' ];
}

if( !is_string( $args[ 'name' ] ) )
{
    return_failure( 'Name is not a string.' );
}

if( !is_string( $args[ 'music' ] ) )
{
    return_failure( 'Music is not a string.' );
}

if( !is_string( $args[ 'gender' ] ) )
{
    return_failure( 'Gender is not a string' );
}

$query = 'INSERT INTO tb_profile( email, age, name, music, gender )';
$query .= 'VALUES( :email, CAST( :age as INTEGER ), :name, :music, :gender )';

$sth = $db->prepare( $query );
$result = $sth->execute( $args );

return_success( $args[ 'name' ] );
?>
