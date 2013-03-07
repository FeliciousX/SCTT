<div class="container">
	<div class="row">
		<div class="span6 login-form">
			<?php echo form_fieldset('Admin Login'); ?>
			<?php echo form_open('admin/login/submit', $form['head']); ?>
	
			<?php if ($this->session->flashdata('error')): ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo $this->session->flashdata('error'); ?>
				</div>
			<?php endif; ?>
	
			<div class="control-group username-group">
				<?php echo form_label('Username:', 'username', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_input($form['username'], set_value('username')); ?>
				</div>
			</div>
	
			<div class="control-group password-group">
				<?php echo form_label('Password:' ,'password', array('class' => 'control-label')); ?>
				<div class="controls">
					<?php echo form_password($form['password']); ?>
				</div>
			</div>
	
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