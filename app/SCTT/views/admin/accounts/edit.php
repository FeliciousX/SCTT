<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
		<div class="span3">
			<?php echo ul($sidebar, $sidebar_attributes); ?>
		</div> <!-- end of sidebar -->
	<div class="span9">
	<?php echo form_fieldset('Edit ' . $editee); ?>
	<?php echo form_open('admin/accounts/edit/' . $editee, element('head', $form)); ?>
	
	<?php if ($this->session->flashdata('error')): ?>
	<div class="row">
		<div class="alert alert-error span5">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php echo $this->session->flashdata('error'); ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php echo form_hidden('username', $editee); ?>
	<div class="control-group password-group">
		<?php echo form_label('Password:', 'password', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_password(element('password', $form)); ?>
			<?php echo form_error('password', '<span class="help-inline">', '</span>'); ?>
		</div>
	</div> <!-- end of password-group -->
	
	<div class="control-group name-group">
		<?php echo form_label('Name:', 'name', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input(element('name', $form), set_value('name')); ?>
		</div>
	</div> <!-- end of name-group -->
	
	<div class="control-group email-group">
		<?php echo form_label('Email:', 'email', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_input(element('email', $form), set_value('email')); ?>
			<?php echo form_error('email', '<span class="help-inline">', '</span>'); ?>
		</div>
	</div> <!-- end of email-group -->

	<div class="control-group status-group">
		<?php echo form_label('Rank:', 'superuser', array('class' => 'control-label')); ?>
		<div class="controls">
			<?php echo form_dropdown('superuser', element('superuser', $form), $rank); ?>
		</div>
	</div> <!-- end of rank-group -->
	

	<div class="control-group button-group">
		<div class="controls">
			<?php echo form_submit(element('submit', $form)); ?>
			<?php echo form_reset(element('clear', $form)); ?>
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