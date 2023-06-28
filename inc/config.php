<?php 
//start the session
//session_start();
//create constants to store non repeating value
define('SITEURL','http://localhost/katti-mitho/');
define('LOCALHOST','localhost');//left side costant name right side value declared so that we can acess it using direct constant name
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','nepapharma');
//3.execute query and save data in database
$conn =mysqli_connect(LOCALHOST, DB_USERNAME,DB_PASSWORD) or die(mysqli_error());//connect database and by default dbusername is root and pw is null
$db_select=mysqli_select_db($conn,DB_NAME) or die(mysqli_error());//selecting database

?>