<?php

session_start();
$_SESSION = array();
session_destroy();
header("location: http://localhost/Dhamni_2.0/index.html");

?>