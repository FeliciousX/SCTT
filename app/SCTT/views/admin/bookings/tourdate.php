<div class="container">
	<h1>Bookings</h1>
	<div class="row">
		<div class="span1">
			<div class="btn-group" name="sort_button_group">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					Tour Date
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<p class="muted"><?php echo nbs(2); ?>Sort By</p>
					<li class="divider"></li>
					<li><a href="<?php echo base_url('admin/home') ?>">Today</a></li>
					<li><a href="<?php echo base_url('admin/home/category') ?> ">Category</a></li>
					<li><a href="<?php echo base_url('admin/home/package') ?>">Package</a></li>
				</ul>
			</div>
		</div>
		<div class="span4">
			<div>
				<form id="booking" name="booking" action="<?php echo base_url('admin/home/tourdate') ?>" method="get">
					<div class="input-append date" id="dp3" data-date="<?php if($this->input->get('date_start')!='') { echo $this->input->get('date_start'); } else { echo date("Y-m-d", (mktime(0,0,0,date("m"),date("d"),date("Y")))); } ?>" data-date-format="yyyy-mm-dd">
			            <input class="span2" id="date_start" name="date_start" size="16" type="text" value="<?php if($this->input->get('date_start')!='') { echo $this->input->get('date_start'); } else { echo date("Y-m-d", (mktime(0,0,0,date("m"),date("d"),date("Y")))); } ?>">
			            <span class="add-on"><i class="icon-th"></i></span>
			            <button type="submit" class="btn btn-primary">Search</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php echo br(2); ?>