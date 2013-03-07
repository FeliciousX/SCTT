<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
		<div class="span3">
			<?php echo ul($sidebar, $sidebar_attributes); ?>
		</div> <!-- end of sidebar -->
	<div class="span9">
	<?php echo form_fieldset('Search Admin'); ?>
	<?php echo form_open('admin/accounts/search', $form['head']); ?>

	<?php if ($this->session->flashdata('success')): ?>
	<div class="row">
		<div class="alert alert-success span5">
			<button type="button" class="close" data-dismiss="alert" onclick="clearForm(edit_admin)">&times;</button>
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

	<label for="radio_username" class="radio inline">
	<?php echo form_radio($form['radio_username']); ?>
	Username
	</label>

	<label for="radio_email" class="radio inline">
	<?php echo form_radio($form['radio_email']); ?>
	Email
	</label>

	<label for="radio_name" class="radio inline">
	<?php echo form_radio($form['radio_name']); ?>
	Name
	</label>

	<?php echo nbs(3); ?>

	<?php echo form_input($form['search'], set_value('search')); ?>
	<?php echo form_button($form['submit'], 'Search'); ?>

	<?php echo form_close(); ?>
	<?php echo form_fieldset_close(); ?>  
	<!-- end of form -->

	<?php echo $table; ?>
	</div>
		</div>
	</div>
	</div>

</div> <!-- end of container -->

<script src="<?php echo base_url('js/forms.js') ?>"></script>