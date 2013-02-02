<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
		<div class="span3">
			<?php echo ul($sidebar, $sidebar_attributes); ?>
		</div> <!-- end of sidebar -->
	<div class="span9">
	<?php echo form_fieldset('Add Admin'); ?>
	<?php echo form_open('admin/accounts/add', $form['head']); ?>
	
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
	<div class="control-group username-group">
		<?php echo form_label('Username:', 'username', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input($form['username'], set_value('username')); ?>
			<?php echo form_error('username', '<span class="help-inline">', '</span>'); ?>
			<span class="help-inline username hide">Minimum 4 letters. Maximum 12 letters.</span>
		</div>
	</div> <!-- end of username-group -->
	
	<div class="control-group password-group">
		<?php echo form_label('Password:', 'password', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_password($form['password']); ?>
			<?php echo form_error('password', '<span class="help-inline">', '</span>'); ?>
			<span class="help-inline password hide">Minimum 5 letters.</span>
		</div>
	</div> <!-- end of password-group -->
	
	<div class="control-group confirm-password-group">
		<?php echo form_label('Confirm Password:', 'confirm_password', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_password($form['confirm_password']); ?>
			<span class="help-inline confirm-password hide">Password does not match!</span>
		</div>
	</div> <!-- end of confirm-password-group -->
	
	<div class="control-group name-group">
		<?php echo form_label('Name:', 'name', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input($form['name'], set_value('name')); ?>
			<?php echo form_error('name', '<span class="help-inline">', '</span>'); ?>
		</div>
	</div> <!-- end of name-group -->
	
	<div class="control-group email-group">
		<?php echo form_label('Email:', 'email', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input($form['email'], set_value('email')); ?>
			<?php echo form_error('email', '<span class="help-inline">', '</span>'); ?>
		</div>
	</div> <!-- end of email-group -->
	
	<div class="control-group button-group">
		<div class="controls">
			<?php echo form_submit($form['submit']); ?>
			<?php echo form_reset($form['clear']); ?>
		</div>
	</div> <!-- end of button-group -->
	<?php echo form_close(); ?>
	<?php echo form_fieldset_close(); ?>
</div> <!-- end of content -->
			</div> <!-- end of div.row -->
		</div> <!-- end of div.span12 -->
	</div> <!-- end of div.row -->

</div> <!-- end of div.container -->

<script src="<?php echo base_url('js/forms.js') ?>"></script>