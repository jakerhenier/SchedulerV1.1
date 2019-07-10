<?php
$conn = mysqli_connect('localhost', 'root', '', 'schedulerv1');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{

	header('schedulerv1/directories/main.html');
}
?> 