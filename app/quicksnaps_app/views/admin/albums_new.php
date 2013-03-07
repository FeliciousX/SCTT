<?php echo form_open_multipart('admin/albums/submit'); ?>

	<div class="hidden">
		<input type="hidden" name="id" value="" />
	</div>


	<div>
		<label>Category Code:</label>
		<input type="disabled" value="<?php echo $c_prefix . $c_code; ?>">
		<input type="hidden" name="cp_code" id="cp_code" value="<?php echo $c_prefix . $c_code; ?>">
	</div>

	<div>
		<label>Package Code:</label>
		<select name="p_code" id="p_code">
			<?php  
				foreach($query_p_by_c as $package)
				{
					echo '<option value="' . $package['p_code'] . '">' . $package['p_code'] . '</option>';
				}
			?>
		</select>
	</div>

	<div>
		<label>Name:</label>
		<input type="text" name="name" value="" />
	</div>


	<div>
		<label>Private?</label>
		<input type="checkbox" name="private" />
	</div>

	<div>
		<label>Theme:</label>
		<select name="theme">
			<?php foreach($themes as $theme):
				$selected = ($theme == GALLERY_THEME) ? ' selected="selected"' : '';
			?>
				<option value="<?php echo $theme; ?>"<?php echo $selected; ?>>
                    <?php echo $theme; ?>
                </option>

			<?php endforeach; ?>
		</select>
	</div>

	<div>
		<label>Description:</label>
		<textarea name="full_txt" rows="10" cols="25"></textarea>
	</div>



	<div class="submit">
		<input type="submit" value="Create Album" />
	</div>

</form>
