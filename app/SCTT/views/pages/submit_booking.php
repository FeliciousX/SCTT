<div class="container">
    <div class="row spacetop">
        <div class="span12">
        	<div class="row">
        		<div class="span8 offset2">
		        	<button type="button" class="close" data-dismiss="alert">&times;</button>
		            <div class="alert alert-success">
		            	<strong>Great!</strong> <?php echo nbs(2); ?>Your booking is successful.
		            	<?php echo nbs(1); ?>We will contact you soon for further information.
		            	<p>Meanwhile, do keep the following booking details for future references.</p>
		            </div>
		        </div>
	        </div>
	        <div class="row">
	        	<div class="hero-unit span9 offset1">
	        		<h1>Booking Details</h1>
	        		<br />
	        		<div class="span10 offset1">
		        		<div class="row">
		        			<h2>
			        			<div class="span3">Booking ID: </div>
			        			<div class="span6"><?php echo $booking[0]['booking_id']; ?> </div>
			        		</h2>
			        	</div>
			        	<div class="row">
			        		<h2>
			        			<div class="span3">Date Booked: </div>
			        			<div class="span6"><?php echo $booking[0]['date_booked']; ?> </div>
			        		</h2>
			        	</div>
			        	<br />
			        	<h3>
			        		<div class="row">
								<div class="span3">Package Code: </div>
								<div class="span6"><?php echo $this->input->post('code'); ?></div>
			        		</div>
			        		<div class="row">
			        			<div class="span3">Starting Tour Date: </div>
			        			<div class="span6"><?php echo $booking[0]['date_start']; ?></div>
			        		</div>
			        		<div class="row">
								<div class="span3">Contact Name: </div>
								<div class="span6"><?php echo $client[0]['first_name'] . ' ' . $client[0]['last_name']; ?></div>
			        		</div>
			        		<div class="row">
			        			<div class="span3">Contact Email:</div>
			        			<div class="span6"><?php echo $client[0]['email']; ?></div>
			        		</div>
			        	</h3>
			        </div>
	        	</div>
	        </div>
        </div>
    </div>
</div>