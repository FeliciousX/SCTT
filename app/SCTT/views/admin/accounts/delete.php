<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
		<div class="span3">
			<?php echo ul($sidebar, $sidebar_attributes); ?>
		</div> <!-- end of sidebar -->
	<div class="span9">
	<?php echo form_fieldset('Delete Admin'); ?>
	<?php echo form_open('admin/accounts/delete', $form['head']); ?>
	
	<?php if ( $this->session->flashdata('success')): ?>
	<div class="row">
		<div class="alert alert-success span5">
			<button type="button" class="close" data-dismiss="alert" onclick="clearForm(delete_admin)">&times;</button>
			<?php echo $this->session->flashdata('success'); ?>
		</div>
	</div>
	<?php elseif( $this->session->flashdata('error')): ?>
	<div class="row">
		<div class="alert alert-error span5">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	</div>
	<?php endif; ?>
	<div class="control-group username-group">
		<?php echo form_label('Username To Delete:', 'username', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input($form['username'], set_value('username')); ?>
			<?php echo form_error('username', '<span class="help-inline">', '</span>'); ?>
		</div>
	</div> <!-- end of username-group -->
	
	<div class="control-group password-group">
		<?php echo form_label('Password:', 'password', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_password($form['password']); ?>
			<?php echo form_error('password', '<span class="help-inline">', '</span>'); ?>
		</div> 
	</div> <!-- end of password-group -->
	
	<div class="control-group button-group">
		<div class="controls">
			<?php echo form_submit($form['submit']); ?>
			<?php echo form_reset($form['clear']); ?>
		</div>
	</div> <!-- end of button-group -->
	<?php echo form_close(); ?>
	<?php echo form_fieldset_close(); ?>
	</div> <!-- end of form -->
			</div>
	</div>
	</div>

</div> <!-- end of container -->

<script src="<?php echo base_url('js/forms.js') ?>"></script>