<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Skyfever";
if (isset($_POST['user'])) {
    // here you would normally include some database connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // never trust what user wrote! We must ALWAYS sanitize user input
    $username = mysql_real_escape_string($_POST['user']);
    // build your query to the database
    $sql = "SELECT count(*) as num FROM codes WHERE code = " . $username;
    // get results
    $row = $db->select_single($sql);
    if($row['num'] == 0) {
        echo 'Username <em>'.$username.'</em> is available!';
    } else {
        echo 'Username <em>'.$username.'</em> is already taken!';
    }
}
?>