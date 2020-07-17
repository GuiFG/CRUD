<?php
	require_once('php/component.php');
	require_once('php/operation.php');
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8"/>
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
<body onload="load();">
	<main>
		<h1>CRUD Database</h1>
		<div class="card">
			<div class="card-header">
				<i class="fa fa-edit"></i><strong> Edit User</strong>
				<a href="search.php" id="idSearch" class="float-right btn btn-dark"><i class="fa fa-globe"></i> Search Users</a>
			</div>
			<div class="card-body">
				<form method="post" action="search.php">
					<input type="hidden" id="id" name="id"/>
					<div class="row">
						<div class="col"> <?php input("idFirst", "first", "text", "First", "Enter first name"); ?> </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idLast", "last", "text", "Last", "Enter last name"); ?>  </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idEmail", "email", "email", "Email", "name123@example.com"); ?> </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idPhone", "phone", "tel", "Phone", "(00) 123456789"); ?>  </div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idLocation", "location", "text", "Location", "Enter city"); ?> <div>
					</div>
					<div class="row">
						<div class="col"> <?php input("idJob", "job", "text", "Job", "Enter name"); ?> </div>
					</div>

					<button class="btn btn-warning" name="read">Update Item</button>
				</form>
			</div>
		</div>
	</main>
	<script>
		function load() {
			let id = document.getElementById("id");
			let first = document.getElementById("idFirst");
			let last = document.getElementById("idLast")
			let email = document.getElementById("idEmail");
			let phone = document.getElementById("idPhone");
			let location = document.getElementById("idLocation");
			let job = document.getElementById("idJob");

			id.value = localStorage.getItem("id");
			first.value = localStorage.getItem("first");
			last.value = localStorage.getItem("last");
			email.value = localStorage.getItem("email");
			phone.value = localStorage.getItem("phone");
			location.value = localStorage.getItem("location");
			job.value = localStorage.getItem("job");

		}

		btnSearch = document.getElementById("idSearch");
		btnSearch.addEventListener('click', clear);

		btnUpdate = document.getElementsByName("read");
		btnUpdate[0].onclick = function() {
			localStorage.removeItem("id");
			localStorage.removeItem("first");
			localStorage.removeItem("last");
			localStorage.removeItem("email");
			localStorage.removeItem("phone");
			localStorage.removeItem("location");
			localStorage.removeItem("job");
		}

		let txtPhone = document.getElementById("idPhone");
		txtPhone.setAttribute("pattern", "[0-9]{11}");
		txtPhone.setAttribute("title", "11 numbers");

		function clear() {
			localStorage.removeItem("id");
			localStorage.removeItem("first");
			localStorage.removeItem("last");
			localStorage.removeItem("email");
			localStorage.removeItem("phone");
			localStorage.removeItem("location");
			localStorage.removeItem("job");

			document.getElementById("id").value = "";
			document.getElementById("idFirst").value = "";
			document.getElementById("idLast").value = "";
			document.getElementById("idEmail").value = "";
			document.getElementById("idPhone").value = "";
			document.getElementById("idLocation").value = "";
			document.getElementById("idJob").value = "";
		}
	</script>
</body>
</html>
