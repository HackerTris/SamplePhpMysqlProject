<?php  //checkuser.php
include_once 'functions.php';
//MY VERSION
//echo "MY VERSION checkuser MODULE <br />";
if (isset($_POST['user']))
{
	
    $user = sanitizeString($_POST['user']);

    if (mysql_num_rows(queryMysql("SELECT * FROM members
        WHERE user='$user'")))
        echo  "<span class='taken'>&nbsp;&#x2718; " .
              "Sorry, this username is taken</span>";
    else echo "<span class='available'>&nbsp;&#x2714; " .
              "This username is available</span>";
}
?>
