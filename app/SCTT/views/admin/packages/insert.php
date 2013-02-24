<div class="container">
	<h1>Insert Category</h1>
	<br />
	<form class="form-horizontal span6 offset2" method="post" id="category" name="category" action="<?php echo base_url('admin/packages/insert'); ?>">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="c_prefix"><abbr title="Category">C</abbr> Prefix</label>
				<div class="controls"><input type="text" class="input-small" id="c_prefix" name="c_prefix" placeholder="1 letter only" value="<?php echo $c_prefix; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="c_code"><abbr title="Category">C</abbr> Code</label>
				<div class="controls"><input type="number" min="1" max="99" class="input-medium" id="c_code" name="c_code" placeholder="Up to 2 digits" value="<?php echo $c_code; ?>" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="p_code"><abbr title="Package">P</abbr> Code</label>
				<div class="controls"><input type="number" min="1" max="999" class="input-medium" id="p_code" name="p_code" placeholder="Up to 3 digits" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="p_name"><abbr title="Package">P</abbr> Name</label>
				<div class="controls"><input type="text" class="input-xlarge" id="p_name" name="p_name" placeholder="Package name" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="price">Price</label>
				<div class="controls"><input type="text" class="input-large" id="price" name="price" placeholder="Up to 7 digits" /></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="description">Description</label>
				<div class="controls"><textarea rows="3" id="description" name="description"></textarea></div>
			</div>
			<div class="control-group">
				<label class="control-label" for="duration">Duration</label>
				<div class="controls"><input type="text" class="input-large" id="duration" name="duration" placeholder="e.g. 2 Days 3 Nights" /></div>
			</div>
			<div class="control-group">
				<div class="controls"><button type="submit" class="btn btn-primary">Submit</button></div>
			</div>
		</fieldset>
	</form>
</div>