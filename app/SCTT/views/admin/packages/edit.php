<div class="container">
	<div class="row offset2">
		<h1>Edit Package</h1>
	</div>
	<br />
	<form class="form-horizontal span6 offset2" method="post" id="category" name="category" action="<?php echo base_url('admin/packages/edit') . '/' . $query_p_specific[0]['p_link_to']; ?>">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="c_prefix"><abbr title="Category">C</abbr> Prefix</label>
				<div class="controls">
					<input type="text" id="c_prefix" name="c_prefix" value="<?php echo $query_p_specific[0]['c_prefix']; ?>" />
					<input type="hidden" id="c_prefix_old" name="c_prefix_old" value="<?php echo $query_p_specific[0]['c_prefix']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_code"><abbr title="Category">C</abbr> Code</label>
				<div class="controls">
					<input type="text" id="c_code" name="c_code" value="<?php echo $query_p_specific[0]['c_code']; ?>" />
					<input type="hidden" id="c_code_old" name="c_code_old" value="<?php echo $query_p_specific[0]['c_code']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="p_code"><abbr title="Package">P</abbr> Code</label>
				<div class="controls">
					<input type="text" id="p_code" name="p_code" value="<?php echo $query_p_specific[0]['p_code']; ?>" />
					<input type="hidden" id="p_code_old" name="p_code_old" value="<?php echo $query_p_specific[0]['p_code']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="p_name"><abbr title="Package">P</abbr> Name</label>
				<div class="controls"><input type="text" id="p_name" name="p_name" value="<?php echo $query_p_specific[0]['p_name']; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="p_name">Price</label>
				<div class="controls"><input type="text" id="price" name="price" value="<?php echo $query_p_specific[0]['price']; ?>" /></div>
			</div>
			<div class="alert alert-info span4">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<h4>Information</h4>&nbsp;The text box for description can be expanded.
			</div>
			<div class="control-group">
				<label class="control-label" for="description">Description</label>
				<div class="controls"><textarea rows="3" id="description" name="description"><?php echo $query_p_specific[0]['description']; ?></textarea></div>
			</div>
			<div class="alert span3 offset1">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong>&nbsp;"Link To" cannot be edited!
			</div>
			<div class="control-group">
				<label class="control-label" for="p_link_to">Link To</label>
				<div class="controls"><input type="text" disabled="disabled" value="<?php echo $query_p_specific[0]['p_link_to']; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="duration">Duration</label>
				<div class="controls"><input type="text" id="duration" name="duration" value="<?php echo $query_p_specific[0]['duration']; ?>" /></div>
			</div>
			<div class="control-group">
				<div class="controls"><button type="submit" class="btn btn-primary">Submit</button></div>
			</div>
		</fieldset>
	</form>
</div>