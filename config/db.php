<?php
//create conn
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	//check the connection
	if(mysqli_connect_errno()){
		//connetion failed
		echo "failed to connect:" . mysqli_connect_errno();
	}