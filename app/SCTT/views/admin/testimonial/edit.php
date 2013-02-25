<div class="container">
	<form id="testimonial" name="testimonial" action="<?php echo base_url('admin/testimonial/edit'); ?>" method="post">
		<fieldset>
			<legend>Edit Testimonial</legend>
			<div class="row">
			<div class="alert alert-info span7">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Information</h4>The text box for message can be expanded. <br/>
				Use standard HTML formatting for the message <?php echo '(e.g. ' . htmlentities("<p>") . ' Sample text ' . htmlentities("<p>") . ' or ' . htmlentities("<br/>") . ' to break to a new line )'; ?>
			</div>
			</div>
			<label for="message">Message</label>
			<textarea rows="3" id="message" name="message"> <?php echo $query[0]['message']; ?> </textarea>
			<label for="source">Source</label>
			<input type="text" class="input-xlarge" id="source" name="source" placeholder="Person who gave the message" value="<?php echo $query[0]['source']; ?>" />
			<br /><button type="submit" class="btn btn-primary">Submit</button>
		</fieldset>
	</form>
</div>