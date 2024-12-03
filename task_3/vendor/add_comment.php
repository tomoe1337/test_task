<?php
require_once('connect.php');


$name = htmlspecialchars($_POST['name']);
$comment = htmlspecialchars($_POST['comment']);
$date = date('Y-m-d h:i:s');

$sql ="INSERT INTO `comments` (`name`, `comment`, `date`) VALUES (?,?,?)";

$var = array($name, $comment, $date);

$stmt = $connect -> prepare($sql);
$stmt -> bind_param('sss',...$var);



$stmt -> execute();


header("location: ../index.php");