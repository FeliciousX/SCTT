<div class="container">
	<h1>Categories</h1>
	<a href="<?php echo base_url('admin/categories/insert') ?>"><button class="btn btn-primary">Add new category</button></a>
	<?php echo br(2); ?>
	<table class="table table-hover">
		<tr>
			<td><h5>Prefix</h5></td>
			<td><h5>Code</h5></td>
			<td><h5>Name</h5></td>
			<td><h5>Description</h5></td>
			<td><h5>Link To</h5></td>
			<td><h5>Featured</h5></td>
			<td><h5>Action</h5></td>
		</tr>
		<?php foreach($query_c as $category) 
			{
		?>
		<tr>
			<td><?php echo $category['c_prefix'] ?></td>
			<td><?php echo $category['c_code'] ?></td>
			<td><?php echo $category['c_name'] ?></td>
			<td><?php echo $category['c_description'] ?></td>
			<td><?php echo $category['c_link_to'] ?></td>
			<td><?php echo $category['featured'] ?></td>
			<td>
			<div class="btn-group">
				<button class="btn btn-small"><a href="<?php echo base_url('admin/packages') . '/' . $category['c_link_to'] ?>">View Packages</a></button>
				<button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url('admin/categories/edit') . '/' . $category['c_link_to'] ?>">Edit</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/categories/delete') . '/' . $category['c_link_to'] ?>">Delete</a>
					</li>
				</ul>
			</div>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
