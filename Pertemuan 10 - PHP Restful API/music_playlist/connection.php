<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DB', 'music_playlist');

$conn = mysqli_connect(HOST, USER, PASS, DB) or die('Unable connect');
?>