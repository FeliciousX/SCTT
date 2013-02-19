<div class="container">
    <div class="row">
        <div class="span12 startOpacity">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url('category'); ?>">Tour Packages</a> <span class="divider">/</span></li>
              <li><a href="<?php echo base_url('category' . '/' . $query_c_specific[0]['c_link_to']); ?>"><?php echo $query_c_specific[0]['c_name']; ?></a> <span class="divider">/</span></li>
              <li class="active"><?php echo $query_p_specific[0]['p_name']; ?></li>
            </ul>
            <div class="row">
                <div class="span4">
                    <ul class="sidebar nav nav-list">
                        <li class="nav-header"><?php echo $query_c_specific[0]['c_name']; ?></li>
                      <?php 
                        foreach($query_p_by_c as $package)
                        {
                      ?>
                        <li <?php if($package['p_name'] == $query_p_specific[0]['p_name']) { echo 'class="active"'; } ?> ><a href="<?php echo base_url('package/' . $package['p_link_to']); ?>"><?php echo $package['p_name']; ?></a></li>
                      <?php 
                        }

                        foreach($query_c as $category) 
                        {
                          if($category['c_name'] != $query_c_specific[0]['c_name'])
                          {
                      ?>
                            <hr />
                            <li class="nav-header"><a class="nav-link" href="<?php echo base_url('category/' . $category['c_link_to']) ?>"><?php echo $category['c_name']; ?></a></li>
                      <?php
                          }
                        }
                      ?>
                      <br/>
                    </ul>
                </div>
                <div class="span8">
                  <div class="hero-unit">
                     <div class="row">
                        <h1><div class="span7"><?php echo $query_p_specific[0]['p_name']; ?></div></h1>
                     </div>
                     <div class="span7">
                        <div class="row">
                           <h3>
                              <div class="span2">Category:</div>
                              <div class="span5"><?php echo $query_c_specific[0]['c_name']; ?></div>
                           </h3>
                        </div>
                        <div class="row">
                           <h3>
                              <div class="span2">Package Code:</div>
                              <div class="span5"><?php echo $cp_code; ?></div>
                           </h3>
                        </div>
                        <div class="row">
                           <h3>
                              <div class="span2">Duration:</div>
                              <div class="span5"><?php echo $query_p_specific[0]['duration']; ?></div>
                           </h3>
                        </div>
                        <?php
                          if($query_p_specific[0]['price'] != 0)
                            {
                        ?>
                        <div class="row">
                           <h3>
                              <div class="span2">Price:</div>
                              <div class="span5">
                                <?php echo $query_p_specific[0]['price']; ?>
                              </div>
                           </h3>
                        </div>
                      </div>
                        <?php 
                          }
                          else
                          {
                        ?>
                      </div>
                      <div class="row">
                        <div class="span7">
                        <div class="alert alert-info">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <h4>Price is unavailable!</h4> Please enquire with us about the pricing of this package.
                        </div>
                        </div>
                      </div>
                        <?php
                          }
                         ?>
                     <br />
                     <div class="row">
                        <div class = "span7">
                           <div class = "well package-well">
                              <p><?php echo $query_p_specific[0]['description']; ?></p>
                           </div>
                        </div>
                     </div>
                     <a href="<?php echo base_url('/booking/index/') . '/' . $cp_code; ?>"><button class="btn btn-primary btn-large rightalign"> Book </button></a>
                     <br />
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>



    