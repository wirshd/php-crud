<?php  include('server.php'); //have to be the same name as the file tht has mysqli_connect

	//fetch the record to be updated	
	if (isset($_GET['edit'])){
		$id = $_GET['edit'];
		$edit = true;

		$rec = mysqli_query($db, "SELECT * FROM  info WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['fullname'];
		$address = $record['address'];
		$poskod = $record['poskod'];
		$id = $record['id'];
	
	}

?> 

<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

	<?php if (isset($_SESSION['message'])):  //display success message ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
				
			?>
		</div>
	<?php endif ?>
		
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th>Poskod</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			
			<tbody>
				<?php //will display the whole array as long there is data in the table?>
				<?php while ($row = mysqli_fetch_array($results)) { ?>
					<tr> <!--the body of while loop is to be displayed so it should be under html not under {} of php' while-->
						<td><?php echo $row['fullname']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['poskod']; ?></td>
						<td>
							<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
						</td>
						<td>
							<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		
		<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="input-group">
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="input-group"> 
				<label>Address</label>
				<input type="text" name="alamat" value="<?php echo $address; ?>">
			</div> 
			<div class="input-group"> 
				<label>Poskod</label>
				<input type="text" name="poskod" value="<?php echo $poskod; ?>">
			</div> 
			<div class="input-group">
			<?php if ($edit == false){ ?>		<!--if else {} paired correctly and in php tag-->
				<button class="btn" type="submit" name="save">Save</button> 
			<?php } else { ?>
				<button class="btn" type="submit" name="update">Update</button>
			<?php } ?>
			</div>
		</form>
		
		
</body>
</html>