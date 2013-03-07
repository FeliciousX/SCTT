<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span3">
				<?php echo ul($sidebar, $sidebar_attributes); ?>
			</div> <!-- ebd if sudebar -->
			<div class="span9">
				<?php echo form_fieldset('Edit Banner'); ?>
		<?php echo form_open_multipart('admin/banner/edit', $form['head']); ?>

		<?php if ($this->session->flashdata('success')): ?>
		<div class="row">
			<div class="alert alert-success span5">
				<button type="button" class="close" data-dismiss="alert" onclick="clearForm(add_admin)">&times;</button>
				<?php echo $this->session->flashdata('success'); ?>
			</div>
		</div>
		<?php elseif ($this->session->flashdata('error')): ?>
		<div class="row">
			<div class="alert alert-error span5">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		</div>
		<?php endif; ?>
		<div class="control-group page-group">
			<?php echo form_label('Choose Page:', 'page', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_dropdown('page', $form['page'], $form['selected_page']); ?>
			</div>
		</div> <!-- end of page-group -->

		<div class="control-group image-group">
			<?php echo form_label('Upload Image:', 'userfile', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_upload($form['image']); ?>
				<?php echo form_error('image', '<span class="help-inline">', '</span>'); ?>
			</div>
		</div> <!-- end of image-group -->
		
		<div class="control-group caption-group">
			<?php echo form_label('Show Caption:', 'caption', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_dropdown('caption', $form['caption'], 0); ?>
				<?php echo form_error('caption', '<span class="help-inline">', '</span>'); ?>
			</div>
		</div> <!-- end of caption-group -->

		<div class="control-group title-group">
			<?php echo form_label('Caption Title:', 'title', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_input($form['title'], set_value('title')); ?>
				<?php echo form_error('title', '<span class="help-inline">', '</span>'); ?>
				<span class="help-inline title hide">Minimum 4 letters. Maximum 12 letters.</span>
			</div>
		</div> <!-- end of title-group -->

		<div class="control-group description-group">
			<?php echo form_label('Caption Description:', 'description', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_textarea($form['description'], set_value('description')); ?>
				<?php echo form_error('description', '<span class="help-inline">', '</span>'); ?>
				<span class="help-inline description hide">Minimum 4 letters. Maximum 12 letters.</span>
			</div>
		</div> <!-- end of description-group -->

		<div class="control-group button-group">
			<?php echo form_label('Caption Button:', 'button', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_input($form['button'], set_value('button')); ?>
				<?php echo form_error('button', '<span class="help-inline">', '</span>'); ?>
				<span class="help-inline button hide">Minimum 4 letters. Maximum 12 letters.</span>
			</div>
		</div> <!-- end of button-group -->

		<div class="control-group link-group">
			<?php echo form_label('Button Link To:', 'link', array('class' => 'control-label')); ?>
			<div class="controls">
				<?php echo form_input($form['link'], set_value('link')); ?>
				<?php echo form_error('link', '<span class="help-inline">', '</span>'); ?>
				<span class="help-inline link hide">Minimum 4 letters. Maximum 12 letters.</span>
			</div>
		</div> <!-- end of link-group -->

		<div class="control-group button-group">
			<div class="controls">
				<?php echo form_submit($form['submit']); ?>
				<?php echo form_reset($form['clear']); ?>
			</div>
		</div> <!-- end of button-group -->
		<?php echo form_close(); ?>
		<?php echo form_fieldset_close(); ?>
			</div>
		</div>
	</div>
	</div>

</div> <!-- end of container -->

<script src="<?php echo base_url('js/forms.js') ?>"></script>