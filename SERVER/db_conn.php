<?php
// costanti per il db
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'my_taclife');
//connessione al database
$con=mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');
