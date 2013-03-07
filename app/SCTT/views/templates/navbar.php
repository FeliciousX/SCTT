<div class="navbar-wrapper">
    <div class="navbar navbar-inverse">
      <div class="navbar-inner">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <div class="span1">
        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'img/SCTT_logo_alpha_white_xsmall.png' ?>" alt="logo" class="logo"></a>
        </div>
        <!-- <a class="brand" href="<?php echo base_url(); ?>">Straits Central Travel &amp; Tour</a> -->
        <div class="span10">
        <div class="nav-collapse collapse">
          <?php echo ul($nav_list, array('class' => 'nav')); ?>
        </div><!--/.nav-collapse -->
        </div>
      </div><!-- /.navbar-inner -->
    </div><!-- /.navbar -->
  <!-- </div> /.container -->
</div><!-- /.navbar-wrapper -->
