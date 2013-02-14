<html><head><title>Setting up database</title></head>
<body><h3>
Setting up...
</h3>


<?php  //setup.php
//MY VERSION OF SETUP
include_once 'functions.php';

$queryString='user VARCHAR(16),
			pass VARCHAR(16),
			INDEX(user(6))';

echo "Create the members table <br />"	;	
createTable('members',$queryString);

$queryString='id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
auth VARCHAR(16),
recip VARCHAR(16),
pm CHAR(1),
time INT UNSIGNED,
message VARCHAR(4096),
INDEX (auth(6)),
INDEX(recip(6))';

echo "Create the messages table <br />"	;
createTable('messages',$queryString);

$queryString='user VARCHAR(16),
friend VARCHAR(16),
INDEX(user(6)),
INDEX(friend(6))';

createTable('friends',$queryString);

$queryString='user VARCHAR(16),
text VARCHAR(4096),
INDEX(user(6))';

createTable('profiles',$queryString);
?>
<br />..done.
</body>body></html>

		