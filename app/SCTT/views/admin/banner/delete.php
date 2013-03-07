<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span3">
				<?php echo ul($sidebar, $sidebar_attributes); ?>
			</div> <!-- ebd if sudebar -->
			<div class="span9">
				<?php echo form_fieldset('Delete Banner'); ?>
		<?php echo form_open_multipart('admin/banner/delete', $form['head']); ?>

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
				<?php echo form_dropdown('page', $form['page'], 0); ?>
			</div>
		</div> <!-- end of page-group -->

		<div class="control-group button-group">
			<div class="controls">
				<?php echo form_submit($form['submit']); ?>
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