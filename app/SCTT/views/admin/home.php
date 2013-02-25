	<table class="table table-hover">
		<tr>
			<td><h5><abbr title="Booking">B</abbr> ID</h5></td>
			<td><h5><abbr title="Category">C</abbr> Prefix</h5></td>
			<td><h5><abbr title="Category">C</abbr> Code</h5></td>
			<td><h5><abbr title="Package">P</abbr> Code</h5></td>
			<td><h5>Email</h5></td>
			<td><h5>Date Booked</h5></td>
			<td><h5>Tour Date</h5></td>
			<td><h5>Status</h5></td>
			<td><h5>Message</h5></td>
		</tr>
		<?php 
			$status_vals = array('PENDING', 'CONFIRMED', 'CANCELLED');
			foreach($query as $booking) 
			{
		?>
		<tr>
			<td><?php echo $booking['booking_id'] ?></td>
			<td><?php echo $booking['c_prefix'] ?></td>
			<td><?php echo $booking['c_code'] ?></td>
			<td><?php echo $booking['p_code'] ?></td>
			<td><?php echo $booking['email'] ?></td>
			<td><?php echo $booking['date_booked'] ?></td>
			<td><?php echo $booking['date_start'] ?></td>
			<td>
				<div class="btn-group" name="sort_button_group">
					<a class="btn btn-small <?php if($booking['status']==$status_vals[0]) { echo 'btn-warning'; } elseif($booking['status']==$status_vals[1]) { echo 'btn-success'; } elseif($booking['status']==$status_vals[2]) { echo 'btn-danger'; } ?> dropdown-toggle" data-toggle="dropdown" href="#">
						<?php echo $booking['status']; ?>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<?php
							for($i = 0; $i < 3; $i++)
							{
								if($status_vals[$i] != $booking['status'])
								{
									echo '<li><a href="' . base_url('admin/home/status') . '/' . $status_vals[$i] . '/' . $booking['booking_id'] . '">' . $status_vals[$i] . '</a></li>';
								}
							}
						?>
					</ul>
				</div>
			</td> 
			<td><?php echo '<abbr title="' . $booking['message'] . '">...</abbr>'; ?> </td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
