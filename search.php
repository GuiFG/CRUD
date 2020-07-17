<?php 
	require_once("php/component.php"); 
	require_once("php/operation.php");
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
<body onload="load()">
	<main>
		<h1>CRUD Database</h1>
		<div class="card">
			<div class="card-header">
				<i class="fa fa-globe"></i><strong> Search Users</strong>
				<a href="index.php" class="float-right btn btn-dark"><i class="fa fa-plus-circle"></i> Add User</a>	
			</div>	
			<div class="card-body">
				<h5 class="card-title"><i class="fa fa-search"></i> Find User</h5>
				<form method="get" action="" onsubmit="setData();">
					<div class="row">
						<input id="id" type="hidden" name="id"/>
						<?php 
							inputSearch("idFirst", "first", "text", "Enter user name"); 
					 		inputSearch("idLast", "last", "text", "Enter last name");  
							inputSearch("idEmail", "email", "email", "Enter email"); ?>
					</div>
					<div class="row">
						<?php
							inputSearch("idPhone", "phone", "tel", "Enter phone"); 
							inputSearch("idLocation", "location", "text", "Enter location"); 
							inputSearch("idJob", "job", "text", "Enter job"); ?>
					</div>
					<div class="button-search">
						<button type="submit" class="btn btn-primary" name="search"><i class="fa fa-search"></i> Search</button>
						<button id="idClear" class="btn btn-danger"><a href="search.php"></a><i class="fa fa-sync"></i> Clear</button>
					</div>	
					<div class="myTable">
						<table class="table table-dark table-striped table-hover">
							<thead>
								<tr>
									<?php thead("ID", "First", "Last", "Email", "Phone", "Location", "Job", "Action"); ?>
								</tr>
							</thead>
							<tbody>
								<?php
								if (isset($_GET['search'])) {
									$result = getData($search=true);
								} else {
									$result = getData();
								}
								
								if ($result) {
									while($row = mysqli_fetch_assoc($result)){ ?>
										<tr>
											<td><?php echo $row['id']; ?></td>
											<td class="t<?php echo $row['id']; ?>"><?php echo $row['first']; ?></td>
											<td class="t<?php echo $row['id']; ?>"><?php echo $row['last']; ?></td>
											<td class="t<?php echo $row['id']; ?>"><?php echo $row['email']; ?></td>
											<td class="t<?php echo $row['id']; ?>"><?php echo $row['phone']; ?></td>
											<td class="t<?php echo $row['id']; ?>"><?php echo $row['location']; ?></td>
											<td class="t<?php echo $row['id']; ?>"><?php echo $row['job']; ?></td>
											<td> <a href="edit.php" id="<?php echo $row['id']; ?>" class="btn btn-info" name="edit"> Edit </a>
										<button id="<?php echo $row['id']; ?>" class="btn btn-danger" name="delete" onclick="return confirm('Are you sure to delete this user?');">Delete</button></td>
										</tr>
							<?php   } 
								} else {
									echo "<tr><h6 class='notFound'>No Record(s) Found!</h6></tr>";
								}
										?> 
							</tbody>
						</table>
					</div>
					<button class="btn btn-dark" name="deleteAll">Delete All</button>
				</form>
			</div>	
		</div>
				
	</main>	
	<script src="main.js"></script>
</body>
</html>
