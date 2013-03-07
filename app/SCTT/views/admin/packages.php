<div class="container">
	<h1>Packages</h1>
	<div class="row">
		<div class="span2"><label for="category_list"><h4>from category</h4></label></div>
	</div>
	<div class="btn-group" name="category_list">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			<?php echo $query_c_specific[0]['c_name']; ?>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<?php 
				foreach($query_c as $category)
				{
					if($category['c_name'] != $query_c_specific[0]['c_name'])
					{
						echo '<li>' . anchor('admin/packages/' . $category['c_link_to'], $category['c_name'])  . '</li>';
					}
				}
			?>
		</ul>
	</div>
	<?php echo br(2); ?>
	<table class="table table-hover">
		<tr>
			<td><h5><abbr title="Category">C</abbr> Prefix</h5></td>
			<td><h5><abbr title="Category">C</abbr> Code</h5></td>
			<td><h5><abbr title="Package">P</abbr> Code</h5></td>
			<td><h5><abbr title="Package">P</abbr> Name</h5></td>
			<td><h5>Price</h5></td>
			<td><h5>Description</h5></td>
			<td><h5>Link To</h5></td>
			<td><h5>Duration</h5></td>
			<td><h5>Action</h5></td>
		</tr>
		<?php foreach($query_p_by_c as $package) 
			{
		?>
		<tr>
			<td><?php echo $package['c_prefix'] ?></td>
			<td><?php echo $package['c_code'] ?></td>
			<td><?php echo $package['p_code'] ?></td>
			<td><?php echo $package['p_name'] ?></td>
			<td><?php echo $package['price'] ?></td>
			<td><abbr title="<?php echo $package['description'] ?>">...</abbr></td>
			<td><?php echo $package['p_link_to'] ?></td>
			<td><?php echo $package['duration'] ?></td>
			<td>
			<div class="btn-group">
				<button class="btn btn-small"><a href="<?php echo base_url('admin/packages/imagery/') . '/' . $package['p_link_to'] ?>">Add Image</a></button>
				<button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
					<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
					<li>
						<a href="<?php echo base_url('admin/packages/edit') . '/' . $package['p_link_to'] ?>">Edit</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/packages/delete') . '/' . $package['p_link_to'] ?>">Delete</a>
					</li>
				</ul>
			</div>
			</td>
		</tr>
		<?php
			}
		?>
	</table>
	<div class="row pull-right">
		<a href="<?php echo base_url('admin/packages/insert') . '/' . $query_c_specific[0]['c_prefix'] . $query_c_specific[0]['c_code']; ?>"><button class="btn btn-primary">Add new package</button></a>
	</div>
</div>
