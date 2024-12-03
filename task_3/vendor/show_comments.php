<?php
require_once('connect.php');

$create_table = 'CREATE TABLE IF NOT EXISTS `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB;';

mysqli_query($connect, $create_table);


$sql = "SELECT * from `comments`";

$data = mysqli_query($connect,$sql);

require_once('templates/comments_list.php');