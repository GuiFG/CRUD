<?php
	require_once('php/component.php');
	require_once('php/operation.php');
?>
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="UTF-8">
	<title>CRUD</title>
	<link type="text/css" rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<style>
		body {
			background-color: #AFAFAF;
		}
	</style>
</head>
<body>
	<main>
		<h1>CRUD Database</h1>
		<div class="card">
			<div class="card-header">
				<i class="fa fa-plus-circle"></i>
				<strong> Add User </strong> 
				<a href="search.php" class="float-right btn btn-dark"><i class="fa fa-globe"></i> Search Users </a>
			</div>
			<div class="card-body">
				<form method="post">
					<div class="row">
						<div class="col"> <?php input("idFirst", "first", "text", "First *", "Enter user name"); ?> </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idLast", "last", "text", "Last *", "Enter last name"); ?>  </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idEmail", "email", "email", "Email", "name123@example.com"); ?> </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idPhone", "phone", "tel", "Phone", "Enter a phone number"); ?>  </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idLocation", "location", "text", "Location", "Enter city"); ?> <div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idJob", "job", "text", "Job", "Enter name job"); ?>  </div>
					</div>

					<button class="btn btn-success" name="create"><i class="fa fa-plus-circle"></i> Add user</button>
				</form>
			</div>
		</div>
	</main>
	<script src="add.js"></script>
</body>
</html>

