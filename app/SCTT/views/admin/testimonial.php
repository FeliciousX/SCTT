<div class="container">
	<h1>Testimonial</h1>
	<?php echo br(2); ?>
	<table class="table table-hover">
		<tr>
			<td><h5>ID</h5></td>
			<td><h5>Message</h5></td>
			<td><h5>Source</h5></td>
			<td><h5>Action</h5></td>
		</tr>
		<?php
			foreach($query as $quote)
			{
		?>
		<tr>
			<td><?php echo $quote['id']; ?></td>
			<td><?php echo $quote['message']; ?></td>
			<td><?php echo $quote['source']; ?></td>
			<td>
				<div class="btn-group">
					<button class="btn btn-small"><a href="<?php echo base_url('admin/testimonial/edit') . '/' . $quote['id'] ?>">Edit</a></button>
					<button class="btn btn-small dropdown-toggle" data-toggle="dropdown">
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li>
							<a href="<?php echo base_url('admin/testimonial/delete') . '/' . $quote['id'] ?>">Delete</a>
						</li>
					</ul>
				</div>
			</td>
		</tr>
		<?php  
			}
		?>
	</table>
	<hr />
	<?php echo br(2); ?>
	<form id="testimonial" name="testimonial" action="<?php echo base_url('admin/testimonial/insert'); ?>" method="post">
		<fieldset>
			<legend>Insert new testimonial</legend>
			<label for="message">Message</label>
			<textarea rows="3" id="message" name="message"></textarea>
			<label for="source">Source</label>
			<input type="text" class="input-xlarge" id="source" name="source" placeholder="Person who gave the message" />
			<br /><button type="submit" class="btn btn-primary">Submit</button>
		</fieldset>
	</form>
</div>