<?php 
    $category = array(  'name' => 'Day Tours from Kuching',
                                  'main_link' => 'day_kuching',
                                  'packages' => array( 'Kuching City Tour', 'Sarawak Cultural Village', 'Bidayuh Longhouse Experience', 'Frogs of Borneo' ),
                                  'links' => array( 'kch_city_tour', 'swk_cultural_village', 'bidayuh_longhouse', 'borneo_frogs' ),
                                  'images' => array( 'daykuching/kuching.png', 'daykuching/culturalvil.png', 'daykuching/bidayuh_longhouse.png', 'daykuching/frogs.png' )
                        );
    $package = array(   'name' => 'Kuching City Tour',
                        'category' => 'Day Tours from Kuching',
                        'code' => 'SC123456',
                        'duration' => '3 Hours',
                        'description' => 'Kuching City, the state capital of Sarawak is absolutely unique with its charm and easy grace. The Sarawak river that runs through the city centre divides the city into Kuching City North and Kuching City South. Kuching city is well preserved with old shopping bazaars, ornate chinese temples, the old stste mosque, colonial administrative buildings and the beautiful Kuching Waterfront. This tour takes you to the city tower for the panoramic view of the city and a visit to the famed Sarawak Museum – the finest Museum in Southeast Asia. Drive past the old state mosque and stop at the beautiful Kuching Waterfront to view the palace of the White Rajah and the magnificent Sarawak State Legislative Building across the river.'
                        );
?>
<div class="container">
    <div class="row">
        <div class="span12 startOpacity">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url('tour_packages'); ?>">Tour Packages</a> <span class="divider">/</span></li>
              <li><a href="<?php echo base_url('category'); ?>"><?php echo $category['name']; ?></a> <span class="divider">/</span></li>
              <li><a href="<?php echo base_url('packages'); ?>"><?php echo $package['name']; ?></a> <span class="divider">/</span></li>
              <li class="active">Booking</li>
            </ul>
            <div class="row">
                <div class="span4">
                    <ul class="sidebar nav nav-list">
                        <li class="nav-header"><?php echo $category['name']; ?></li>
                        <li><a href="<?php echo base_url('/category/package/' . $category['links'][0]); ?>"><?php echo $category['packages'][0]; ?></a></li>
                        <li><a href="<?php echo base_url('/category/package/' . $category['links'][1]); ?>"><?php echo $category['packages'][1]; ?></a></li>
                        <li><a href="<?php echo base_url('/category/package/' . $category['links'][2]); ?>"><?php echo $category['packages'][2]; ?></a></li>
                        <li><a href="<?php echo base_url('/category/package/' . $category['links'][3]); ?>"><?php echo $category['packages'][3]; ?></a></li>
                    </ul>
                </div>
                <div class="span8">
                  <form class="formarea form-horizontal" id="booking_form" name="booking_form" action="submit_booking.php">
                     <fieldset>
                           <h2><legend>Booking Page</legend></h2>
                        <div class="control-group">
                           <h1><?php echo $package['name']; ?></h1>
                        </div>
                           <div class="control-group">
                              <label class="control-label" for="category">Category</label> 
                              <div class="controls"><input type="text" disabled="disabled" value="<?php echo $package['category']; ?>" id="category" name="category" /></div>
                           </div>
                           <div class="control-group">
                              <label class="control-label" for="code">Package Code</label> 
                              <div class="controls"><input type="text" disabled="disabled" value="<?php echo $package['code']; ?>" id="code" name="code" /></div>
                           </div>
                           <div class="control-group">
                              <label class="control-label" for="duration">Duration</label>
                              <div class="controls"><input type="text" disabled="disabled" value="<?php echo $package['duration']; ?>" id="duration" name="duration" /></div>
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
                              <input type="text" placeholder="Intended Date of Tour" id="subject" name="subject" />
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
                           <div class="controls"></div>
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



    