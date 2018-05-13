<?php

//create connection

$conn = mysqli_connect('localhost', 'root', 'root', 'journal');

//Check connection
if(mysqli_connect_errno()){
  //connection failed
  echo 'Failed to connect to MySQL'. mysqli_connect_errno;
}


?>
