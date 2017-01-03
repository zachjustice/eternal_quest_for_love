<?
require_once( 'common/includes.php' );
$SITE_TITLE = 'Quest for Eternal Love';

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

        <div id="create_profile_form">
            <label>Email Address:</label>
            <input id="email" name="email" type="text"/>
            <br />

            <label>Name:</label>
            <input id="name" name="name" type="text"/>
            <br />

            <label>Age:</label>
            <input id="age" name="age" type="number"/>
            <br />

            <label>Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br />

            <label>Music:</label>
            <input id="music" name="music" type="text"/>
        </div>
       <input id="submit_create_profile_form" type="submit" value="Submit" onclick="send_create_profile_request()" /> 
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="common/index.js"></script>
</html>
