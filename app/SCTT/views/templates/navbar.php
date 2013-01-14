<div class="navbar-wrapper">
  <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
  <div class="container">

    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="<?php echo base_url(); ?>">Straits Central Travel &amp; Tour</a>
        <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
        <div class="nav-collapse collapse">
          <ul class="nav">
           <?php
			foreach ($nav_list as $li)
			{
				// Assign $link with $li
				$link = $li;

				// If there's space in the string, attach it with "_"
				if (strpos($li, ' ') > -1) {
					$link = implode('_', explode(' ',$li));
				}

				// Links are then changed to lowercase and original text is preserved in $li
				// Active class means active in the navbar
				echo '<li ';
				if (strcmp(strtolower($link), $nav_active[0]) == 0) { echo 'class=active';	}
				echo '><a href="' . base_url(strtolower($link)) . "\">{$li}</a></li>\n" ;
			}
			?>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->

  </div> <!-- /.container -->
</div><!-- /.navbar-wrapper -->
