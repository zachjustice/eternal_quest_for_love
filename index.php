<?
$SITE_TITLE = 'Quest for Eternal Love';


$query  = "INSERT INTO tb_profile( email, name, age, gender, music )";
$query .= " VALUES( :email, :name, :age, :gender, :music )";

$params = array( 
    'email' => 'claire@gmail.com',
    'name'  => 'Cliare Bear',
    'age'   => 21,
    'gender' => 'F',
    'music' => 'Hipster'
);

$statement = $db->prepare( $query );

try
{
    $status = $statement->execute( $params );
}
catch( PDOexception $e )
{
    error_log( $e );
}
?>

<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset=utf-8>
        <title><?= $SITE_TITLE ?></title>
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>

    <body>
        <h1><?= $SITE_TITLE ?></h1>
        <p>Fill out the below form to find eternal love.</p>
        <form id="makematch">
            <label>Email Address:</label>
            <input id="email" name="email" type="text"/>
            <br/>

            <label>Name:</label>
            <input id="name" name="name" type="text"/>
            <br/>

            <label>Age:</label>
            <input id="age" name="age" type="text"/>
            <br/>

            <label>Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br/>
            
            <label>Age:</label>
            <input id="music" name="music" type="text"/>
        </form>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</html>
