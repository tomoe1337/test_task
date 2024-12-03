<?php

	$connect = mysqli_connect(hostname: "localhost", username: "root",password:'', database:'database1');

	if (!$connect){
		die("Error connect to database");
	}

	