<div class="container">
	<h1>Insert Category</h1>
	<br />
	<form class="form-horizontal span6 offset2" method="post" id="category" name="category" action="<?php echo base_url('admin/categories/insert'); ?>">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="c_prefix">Prefix</label>
				<div class="controls"><input type="text" class="input-small" id="c_prefix" name="c_prefix" placeholder="1 letter only" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_code">Code</label>
				<div class="controls"><input type="text" class="input-small" id="c_code" name="c_code" placeholder="Up to 2 digits" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_name">Name</label>
				<div class="controls"><input type="text" class="input-xlarge" id="c_name" name="c_name" placeholder="Category name" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_description">Description</label>
				<div class="controls"><input type="text" class="input-xlarge" id="c_description" name="c_description" placeholder="Not used at the moment (leave blank)" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="featured">Featured</label>
				<div class="controls"><input type="text" class="input-small" id="featured" name="featured" placeholder="1 digit (0 - 9)" /></div>
			</div>
			<div class="control-group">
				<div class="controls"><button type="submit" class="btn btn-primary">Submit</button></div>
			</div>
		</fieldset>
	</form>
</div>