<div class="container">
    <div class="row">
        <div class="span12 startOpacity">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url('category'); ?>">Tour Packages</a> <span class="divider">/</span></li>
              <li><a href="<?php echo base_url('category' . '/' . $query_c_specific[0]['c_link_to']); ?>"><?php echo $query_c_specific[0]['c_name']; ?></a> <span class="divider">/</span></li>
              <li><a href="<?php echo base_url('packages' . '/' . $query_p_specific[0]['p_link_to']); ?>"><?php echo $query_p_specific[0]['p_name']; ?></a> <span class="divider">/</span></li>
              <li class="active">Booking</li>
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
                  <form class="formarea form-horizontal" id="booking_form" name="booking_form" action="submit_booking.php">
                     <fieldset>
                           <h2><legend>Booking Page</legend></h2>
                        <div class="control-group">
                           <h1><?php echo $query_p_specific[0]['p_name']; ?></h1>
                        </div>
                           <div class="control-group">
                              <label class="control-label" for="category">Category</label> 
                              <div class="controls"><input class="input-xlarge" type="text" disabled="disabled" value="<?php echo $query_c_specific[0]['c_name']; ?>"/></div>
                              <input type="hidden" value="<?php echo $query_c_specific[0]['c_name']; ?>" id="category" name="category" />
                           </div>
                           <div class="control-group">
                              <label class="control-label" for="code">Package Code</label> 
                              <div class="controls"><input type="text" disabled="disabled" value="<?php echo $cp_code; ?>" /></div>
                              <input type="hidden" value="<?php echo $cp_code; ?>" id="code" name="code" />
                           </div>
                           <div class="control-group">
                              <label class="control-label" for="duration">Duration</label>
                              <div class="controls"><input type="text" disabled="disabled" value="<?php echo $query_p_specific[0]['duration']; ?>" /></div>
                              <input type="hidden" value="<?php echo $query_p_specific[0]['duration']; ?>" id="duration" name="duration" />
                           </div>
                        <hr />
                        <div class="control-group">
                           <label class="control-label" for="f_name">Name</label>
                           <div class="controls">
                              <input type="text" autofocus placeholder="First Name" id="f_name" name="f_name" />
                              <input type="text" class="input-medium" placeholder="Last Name" id="l_name" name="l_name" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="address">Address</label>
                           <div class="controls">
                              <textarea rows="3" placeholder="Address" id="address" name="address"></textarea>
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="phone_num">Contact Number</label>
                           <div class="controls">
                              <input type="tel" class="input-large" placeholder="Contact Number" id="phone_num" name="phone_num" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="email">Email</label>
                           <div class="controls">
                              <input type="text" placeholder="Email" id="email" name="email" />
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="date">Date</label>
                           <div class="controls">
                              <div class="input-append date" id="dp3" data-date="<?php echo date("d-m-Y", (mktime(0,0,0,date("m"),date("d"),date("Y")))); ?>" data-date-format="dd-mm-yyyy">
                              <input class="span2" size="16" type="text" value="<?php echo date("d-m-Y", (mktime(0,0,0,date("m"),date("d"),date("Y")))); ?>">
                              <span class="add-on"><i class="icon-th"></i></span>
                              </div>
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="message">Message</label>
                           <div class="controls">
                              <textarea rows="4" placeholder="Is there anything you would like to let us know or ask about?" id="message" name="message" ></textarea>
                           </div>
                        </div>
                        <div class="control-group">
                           <label class="control-label" for="captcha">Human Verification</label>
                           <div class="controls">
                              <?php 
                              // echo $cap['image']; 
                              ?>
                              <input class="input-xlarge" type="text" placeholder="Insert what you see in the image above" name="captcha" value="" />
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-large rightalign"> Submit Booking </button>
                        <br />
                     </fieldset>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>



    