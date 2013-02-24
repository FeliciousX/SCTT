<div class="container">
	<h1>Edit Category</h1>
	<br />
	<form class="form-horizontal span6 offset2" method="post" id="category" name="category" action="<?php echo base_url('admin/categories/edit') . '/' . $query_c_specific[0]['c_link_to']; ?>">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="c_prefix">Prefix</label>
				<div class="controls"><input type="text" id="c_prefix" name="c_prefix" value="<?php echo $query_c_specific[0]['c_prefix']; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_code">Code</label>
				<div class="controls"><input type="text" id="c_code" name="c_code" value="<?php echo $query_c_specific[0]['c_code']; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_name">Name</label>
				<div class="controls"><input type="text" id="c_name" name="c_name" value="<?php echo $query_c_specific[0]['c_name']; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_description">Description</label>
				<div class="controls"><input type="text" id="c_description" name="c_description" value="<?php echo $query_c_specific[0]['c_description']; ?>" /></div>
			</div>
			<div class="alert span3 offset1">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Warning!</strong>&nbsp;"Link To" cannot be edited!
			</div>
			<div class="control-group">
				<label class="control-label" for="c_link_to">Link To</label>
				<div class="controls">
					<input type="text" disabled="disabled" value="<?php echo $query_c_specific[0]['c_link_to']; ?>" />
					<input type="hidden" id="c_link_to_old" name="c_link_to_old"  value="<?php echo $query_c_specific[0]['c_link_to']; ?>" />
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="featured">Featured</label>
				<div class="controls"><input type="text" id="featured" name="featured" value="<?php echo $query_c_specific[0]['featured']; ?>" /></div>
			</div>
			<div class="control-group">
				<div class="controls"><button type="submit" class="btn btn-primary">Submit</button></div>
			</div>
		</fieldset>
	</form>
</div>