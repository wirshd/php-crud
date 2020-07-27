<?php 
	session_start();

	//connect to db
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$poskod = "";
	$edit = false;

	//if the save button is clicked
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$address = $_POST['alamat'];
		$poskod = $_POST['poskod'];

		mysqli_query($db, "INSERT INTO info (fullname, address, poskod) VALUES ('$name', '$address', '$poskod')"); 
		$_SESSION['message'] = "INPUT SAVED"; //display success message
		header('location: index.php'); //redirect to index page after inserting.
	}

	//update records
	if (isset($_POST['update'])){
		$name = $_POST['name']; //use mysqli->
		$address = $_POST['alamat'];
		$poskod = $_POST['poskod'];
		$id = $_POST['id']; 
		
		echo "UPDATE info name='$name', address='$address', poskod='$poskod' WHERE id=$id";
		mysqli_query($db, "UPDATE info SET fullname='$name', address='$address', poskod='$poskod' WHERE id=$id"); 
		$_SESSION['message'] = "INPUT UPDATED";
		header('location: index.php'); //redirect to index page after updating.

	}

	//delete records

	if (isset($_GET['del'])){
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id"); 
		$_SESSION['message'] = "INPUT DELETED";
		header('location: index.php');
	
	}


	//retrieve records
	$results = mysqli_query($db, "SELECT * FROM info");


?>