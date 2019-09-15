<?php
include_once 'api/Crypt.php';
$crypt = new Crypt();
$salt = "123";
$crypted = $crypt->encrypt("co bedzie to bedzie byle by nie było do końca");
echo $crypted . "<br>";
echo $crypt->decrypt($crypted);

?>