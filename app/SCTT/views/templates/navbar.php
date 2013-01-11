<div class="container">
<div class="row">
	<div class="sixteencol navbar">
		<nav>
			<ul>
				<?php
				$this->load->helper('url');
				foreach ($nav_list as $li) {
					echo "<li><a href=\"" . base_url("$li") . "\">$li</a></li>\n" ;
				}
				?>
			</ul>
		</nav>
	</div>
</div>