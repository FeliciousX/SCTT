<div class="container">
	<h1>Bookings</h1>
	<div class="btn-group" name="sort_button_group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			Category
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<p class="muted"><?php echo nbs(2); ?>Sort By</p>
			<li class="divider"></li>
			<li><a href="<?php echo base_url('admin/home/') ?> ">Today</a></li>
			<li><a href="<?php echo base_url('admin/home/package') ?>">Package</a></li>
			<li><a href="<?php echo base_url('admin/home/tourdate') ?>">Tour Date</a></li>
		</ul>
	</div>
	<div class="btn-group" name="category_list">
		<a class="btn btn-inverse dropdown-toggle" data-toggle="dropdown" href="#">
			<?php echo $query_c_specific[0]['c_name']; ?>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<?php 
				foreach($query_c as $category)
				{
					if($category['c_name'] != $query_c_specific[0]['c_name'])
					{
						echo '<li>' . anchor('admin/home/category/' . $category['c_link_to'], $category['c_name'])  . '</li>';
					}
				}
			?>
		</ul>
	</div>
	<?php echo br(2); ?>