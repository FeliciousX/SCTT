<div class="container">
	<h1>Bookings</h1>
	<div class="btn-group" name="sort_button_group">
		<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
			Today
			<span class="caret"></span>
		</a>
		<ul class="dropdown-menu">
			<p class="muted"><?php echo nbs(2); ?>Sort By</p>
			<li class="divider"></li>
			<li><a href="<?php echo base_url('admin/home/category') ?> ">Category</a></li>
			<li><a href="<?php echo base_url('admin/home/package') ?>">Package</a></li>
			<li><a href="<?php echo base_url('admin/home/tourdate') ?>">Tour Date</a></li>
		</ul>
	</div>
	<?php echo br(2); ?>