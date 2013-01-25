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
              <li class="active"><?php echo $package['name']; ?></li>
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
                  <div class="hero-unit">
                     <div class="row">
                        <h1><div class="span12"><?php echo $package['name']; ?></div></h1>
                     </div>
                     <div class="span12">
                        <div class="row">
                           <h3>
                              <div class="span2">Category:</div>
                              <div class="span10"><?php echo $package['category']; ?></div>
                           </h3>
                        </div>
                        <div class="row">
                           <h3>
                              <div class="span2">Package Code:</div>
                              <div class="span10"><?php echo $package['code']; ?></div>
                           </h3>
                        </div>
                        <div class="row">
                           <h3>
                              <div class="span2">Duration:</div>
                              <div class="span10"><?php echo $package['duration']; ?></div>
                           </h3>
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class = "span7">
                           <div class = "well">
                              <p><?php echo $package['description']; ?></p>
                           </div>
                        </div>
                     </div>
                     <button class="btn btn-primary btn-large rightalign" href="<?php echo base_url('/category') . '/' . $category['main_link'] . '/' . $package['code']; ?>"> Book </button>
                     <br />
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>



    