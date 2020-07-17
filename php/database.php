<?php
function createDataBase() {
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "information";

	$connection = mysqli_connect($servername, $username, $password);

	if (!$connection)
		die("Connection Failed: ".mysqli_connect_error());

	$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

	if (mysqli_query($connection, $sql)){
		$connection = mysqli_connect($servername, $username, $password, $dbName);
		
		$sql = "
			CREATE TABLE IF NOT EXISTS clients(
				id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				first VARCHAR(20) NOT NULL,
				last VARCHAR(20) NOT NULL,
				email VARCHAR(30) NULL,
				phone VARCHAR(15) NULL,
				location VARCHAR(20) NULL,
				job VARCHAR(20) NULL
			);
		";

		if(mysqli_query($connection, $sql))
			return $connection;
		else
			echo "Cannot create table: ".mysqli_error($connection);

	} else {
		echo "Error while creating database: ".mysqli_error($connection);
	}
}	

?>
