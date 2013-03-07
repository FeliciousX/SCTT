<?php echo form_open_multipart('admin/albums/new_album'); ?>

	<div>
		<label>Category Code:</label>
		<select name="cp_code" id="cp_code">
			<?php  
				foreach($query_c as $category)
				{
					echo '<option value="' . $category['c_prefix'] . $category['c_code'] . '">' .  $category['c_prefix'] . $category['c_code'] . '</option>';
				}
			?>
		</select>
	</div>

	<div class="submit">
		<input type="submit" value="Next" />
	</div>

</form>
