<div class="container">
	<div class="row spacetop">
		<div class="span12">
			<ul class="breadcrumb">
	            <li><a href="<?php echo base_url('home'); ?>">Home</a> <span class="divider">/</span></li>
	            <li class="active">Testimonial</li>
	        </ul>
			<div class="hero-unit">
				<h1>Testimonial</h1>
				<br />
				<?php 
					foreach($query as $quote)
					{
						echo '<blockquote>' . $quote['message'];
						echo '<small>' . $quote['source'] . '</small></blockquote>';
					}
				?>
			</div>
		</div>
	</div>
</div>