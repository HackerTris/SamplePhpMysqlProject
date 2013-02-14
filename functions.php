<?php  // functions.php.  This file will contain common functions and database connection info

$dbhost='localhost';
$dbname='WebSite';
$dbuser='stormy';
$dbpass='storm';
$appname="StormCenter";

//echo("Connect to the server <br />");
mysql_connect($dbhost,$dbuser,$dbpass) or die(mysql_error());

//echo("Select the correct database <br />");
mysql_select_db($dbname) or die(mysql_error());

function createTable($name,$query)  //I'm quessing that the query contains table creation parameters
{
	echo("Function createTable, reporting for duty <br />");
	queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
	echo "Table '$name' created or already exists. <br />";
}

function queryMysql($query)
{
	$result=mysql_query($query) or die(mysql_error());
	return $result;
}

function destroySession()
{
	$_SESSION=array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(),"",time()-2592000,'/');
	session_destroy();
}

function sanitizeString($var)
{
	$var=strip_tags($var);
	$var=htmlentities($var);
	$var=stripslashes($var);
	return mysql_real_escape_string($var);
}

//MINE
function showProfile($user)
{
	if (file_exists("$user.jpg"))
		echo "<img src='$user.jpg' align='left' />";
		
	$result=queryMysql ("SELECT * FROM profiles WHERE user='$user'");
	if (mysql_num_rows($result))
	{
		$row=mysql_fetch_row($result);
		echo stripslashes($row[1])."<br clear=left /><br>";
	}
	
}
?>