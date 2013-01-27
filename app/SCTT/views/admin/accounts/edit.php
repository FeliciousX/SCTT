<div class="container">
	<div class="row">
	<div class="span12">
		<div class="row">
		<div class="span3">
			<?php echo ul($sidebar, $attributes); ?>
		</div> <!-- end of sidebar -->
	<div class="span9">
	<?php echo form_fieldset('Edit Admin'); ?>
	<?php echo form_open('admin/accounts/edit', $form['head']); ?>

	<?php echo form_radio($form['username']); ?>
	<?php echo form_label('Username', 'username') . nbs(3); ?>

	<?php echo form_radio($form['email']); ?>
	<?php echo form_label('Email', 'email') . nbs(3); ?>

	<?php echo form_radio($form['name']); ?>
	<?php echo form_label('Name', 'name') . nbs(3); ?>


	<?php echo form_input($form['search'], set_value('search')); ?>
	<?php echo form_button($form['submit'], 'Search'); ?>

	<?php echo form_close(); ?>
	<?php echo form_fieldset_close(); ?>  
	<!-- end of form -->
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Username</th>
				<th>Name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$i = 0;
			
			if ($admin != false) {
				foreach ($admin as $person) {
					$i++;
					echo '<tr>';
					echo "<td>{$i}</td>";
					echo "<td>{$person->username}</td>";
					echo "<td>{$person->name}</td>";
					echo "<td>{$person->email}</td>";
					echo '</tr>';
				}
			}

			?>
		</tbody>		
	</table>
	</div>
		</div>
	</div>
	</div>

</div> <!-- end of container -->

<script src="<?php echo base_url('js/forms.js') ?>"></script>