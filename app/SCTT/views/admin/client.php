<div class="container">
	<h1><?php echo $query[0]['email'] ?></h1>
	<table class="table table-striped">
		<tr>
			<td><h5>First Name</h5></td>
			<td><h6><?php echo $query[0]['first_name'] ?></h6></td>
		</tr>
		<tr>
			<td><h5>Last Name</h5></td>
			<td><h6><?php echo $query[0]['last_name'] ?></h6></td>
		</tr>
		<tr>
			<td><h5>Contact No</h5></td>
			<td><h6><?php echo $query[0]['contact_no'] ?></h6></td>
		</tr>
		<tr>
			<td><h5>Fax No</h5></td>
			<td><h6><?php echo $query[0]['fax_no'] ?></h6></td>
		</tr>
		<tr>
			<td><h5>Address</h5></td>
			<td><h6><?php echo $query[0]['address'] ?></h6></td>
		</tr>
		<tr>
			<td><h5>Country</h5></td>
			<td><h6><?php echo $query[0]['country'] ?></h6></td>
		</tr>
	</table>
</div>