<div class="container">
	<h1>Bookings</h1>
	<div class="row">
		<div class="span2"><label for="category_list"><h4>from category</h4></label></div>
	</div>
	<div class="row">
		<div class="span4">
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
								echo '<li>' . anchor('admin/home/package/' . $category['c_link_to'], $category['c_name'])  . '</li>';
							}
						}
					?>
				</ul>
			</div>
		</div>
	</div>
	<br />
	<div class="btn-group" name="sort_button_group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			Package
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<p class="muted"><?php echo nbs(2); ?>Sort By</p>
			<li class="divider"></li>
			<li><a href="<?php echo base_url('admin/home') ?>">Today</a></li>
			<li><a href="<?php echo base_url('admin/home/category') ?> ">Category</a></li>
			<li><a href="<?php echo base_url('admin/home/tourdate') ?>">Tour Date</a></li>
		</ul>
	</div>
	<div class="btn-group" name="package_list">
		<a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">
			<?php echo $query_p_specific[0]['p_name']; ?>
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<?php 
				foreach($query_p_by_c as $package)
				{
					if($package['p_name'] != $query_p_specific[0]['p_name'])
					{
						echo '<li>' . anchor('admin/home/package/' . $package['p_link_to'], $package['p_name'])  . '</li>';
					}
				}
			?>
		</ul>
	</div>
	<?php echo br(2); ?>