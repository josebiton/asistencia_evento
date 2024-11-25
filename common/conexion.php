<?php
//error_reporting(0);
$hostname = 'localhost';
$database = 'eventos';
$username = 'root';
$password = '';
if(!isset($_SESSION)){ session_start();}
$link = new mysqli($hostname, $username, $password,$database); 
date_default_timezone_set('America/Lima');
?>

