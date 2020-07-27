	
		<table>
			<thead>
				<tr>
					<th>Name</th>
					<th>Address</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			
			
			<?php //will display the whole array as long there is data in the table?>
			<?php while ($row = mysqli_fetch_array($results)) { ?>
				<tr> <!--the body of while loop is to be displayed so it should be under html not under {} of php' while-->
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['address']; ?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
					</td>
					<td>
						<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</table>
		

		<form method="post" action="server.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="input-group">
				<label>Name</label>
				<input type="text" name="name" value="<?php echo $name; ?>">
			</div>
			<div class="input-group"> 
				<label>Address</label>
				<input type="text" name="address" value="<?php echo $address; ?>">
			</div> 
			<div class="input-group">
			<?php if ($edit == false): ?>
				<button class="btn" type="submit" name="save">Save</button>
			<?php else: ?>
				<button class="btn" type="submit" name="update">Update</button>
			</div>
		</form>
		