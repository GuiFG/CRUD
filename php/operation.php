<?php
require_once("database.php");

$connection = createDataBase();	

if (isset($_POST['create'])){
	createItem();
}

if (isset($_POST['read'])){
	editItem();
}

if (isset($_GET['delete'])){
	deleteItem();
}

if (isset($_GET['deleteAll'])){
	deleteAll();
}

function createItem() {
	$first = textValue("first");
	$last = textValue("last");
	
	$sql = "SELECT * FROM clients WHERE first = '$first' AND last = '$last'";
	$rows = mysqli_query($GLOBALS['connection'], $sql);

	if ($first && $last && mysqli_num_rows($rows) == 0){
		$email = textValue("email");
		$phone = textValue("phone");
		$location = textValue("location");
		$job = textValue("job");

		$first = ucfirst(strtolower($first));
		$last = ucfirst(strtolower($last));
		$location = ucfirst(strtolower($location));
		$job = ucfirst(strtolower($job));

		$sql = "INSERT INTO clients (first, last, email, phone, location, job)
				VALUES ('$first', '$last', '$email', '$phone', '$location', '$job')";

		if (mysqli_query($GLOBALS['connection'], $sql))
			showMessage("Item created susccessfully!", "success");
		else
			showMessage("Error when inserted a item!", "error");

		$sql = "UPDATE clients 
		SET phone = CONCAT('(' , SUBSTRING(phone, 1, 2), ') ', SUBSTRING(phone, 3, 5), '-', SUBSTRING(phone, 8, 4)) 
		WHERE id = (SELECT max(id) FROM clients)";

		if (! mysqli_query($GLOBALS['connection'], $sql)) 
			showMessage("Error! Update invalid!", "error");
		
	} else if (mysqli_num_rows($rows) != 0) {
		showMessage("Error! Data already provided.", "error");
	} else {
		showMessage("Error! Provide data at least first, last textbox.", "error");
	}
	
}

function editItem() {
	$id = textValue("id");
	$first = textValue("first");
	$last = textValue("last");
	$email = textValue("email");
	$phone = textValue("phone");
	$location = textValue("location");
	$job = textValue("job");

	if ($id && $first && $last) {
		$first = ucfirst(strtolower($first));
		$last = ucfirst(strtolower($last));
		$location = ucfirst(strtolower($location));
		$job = ucfirst(strtolower($job));
		
		$sql = " UPDATE clients SET first='$first', last='$last', email='$email', phone='$phone', 
				location='$location', job='$job' WHERE id='$id'"; 
	
		if(mysqli_query($GLOBALS['connection'], $sql))
			showMessage("Success Updated!", "success");
		else
			showMessage("Error while updating!", "error");

		$sql = "UPDATE clients 
		SET phone = CONCAT('(' , SUBSTRING(phone, 1, 2), ') ', SUBSTRING(phone, 3, 5), '-', SUBSTRING(phone, 8, 4)) 
		WHERE id='$id' ";

		if (! mysqli_query($GLOBALS['connection'], $sql)) 
			showMessage("Error! Update invalid!", "error");
	
	} else {
		showMessage("Error! Provide data at least first, last textbox.", "error");
	}

}

function deleteItem(){
	$id = txtValue("id");
	$sql = "DELETE FROM clients WHERE id=$id";

	if (mysqli_query($GLOBALS['connection'], $sql)) {
		showMessage("Item successfully deleted!", "success");
		if(!getData()) {
			$sql = "ALTER TABLE clients AUTO_INCREMENT = 1";
			mysqli_query($GLOBALS['connection'], $sql);
		}
	} else {
		showMessage("Error when deleting an item!", "error");
	}
}

function deleteAll() {
	if (getData()) {
		$sql = "DROP TABLE clients";

		if (mysqli_query($GLOBALS['connection'], $sql)){
			showMessage("All items successfully deleted!", "success");
			$GLOBLAS['connection'] = createDataBase();
		} else {
			showMessage("Error when deleting all items!", "error");
		}
	} else {
		showMessage("No data in database!", "error");
	}
}

function getData($search=false){
	if (!$search) {
		$sql = "SELECT * FROM clients";
		
		$r = mysqli_query($GLOBALS['connection'], $sql); 
			
		if ($r && mysqli_num_rows($r) > 0)
			return $r;
	} else {
		$first = txtValue("first");
		$last = txtValue("last");
		$email = txtValue("email");
		$phone = txtValue("phone");
		$location = txtValue("location");
		$job = txtValue("job");
		
		$sql = "SELECT * FROM clients 
				WHERE first LIKE '$first%' and last LIKE '$last%' and email LIKE '$email%' and phone LIKE 					'$phone%' and location LIKE '$location%' and job LIKE '$job%'";
	
		$r = mysqli_query($GLOBALS['connection'], $sql);
		
		if ($r && mysqli_num_rows($r) > 0)		
			return $r;
	}
	
	return false;
}


function textValue($text) {
	$box = mysqli_real_escape_string($GLOBALS['connection'], trim($_POST[$text]));
	if (!empty($box))
		return $box;
	return false;
}

function txtValue($name) {
	$box = mysqli_real_escape_string($GLOBALS['connection'], trim($_GET[$name]));
	if (!empty($box))
		return $box;
	return "";
}

function showMessage($message, $className) {
	echo "<h6 class='$className'>$message</h6>";
}
	
?>
