<?php 
    $category = array(  'name' => 'Day Tours from Kuching',
                                  'main_link' => 'day_kuching',
                                  'packages' => array( 'Kuching City Tour', 'Sarawak Cultural Village', 'Bidayuh Longhouse Experience', 'Frogs of Borneo' ),
                                  'links' => array( 'kch_city_tour', 'swk_cultural_village', 'bidayuh_longhouse', 'borneo_frogs' ),
                                  'images' => array( 'daykuching/kuching.png', 'daykuching/culturalvil.png', 'daykuching/bidayuh_longhouse.png', 'daykuching/frogs.png' )
                        );
?>
<div class="container">
    <div class="row">
        <div class="span12 startOpacity">
            <ul class="breadcrumb">
              <li><a href="<?php echo base_url('tour_packages'); ?>">Tour Packages</a> <span class="divider">/</span></li>
              <li class="active"><?php echo $category['name']; ?></li>
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
                <!-- <div class="span8">
                    <?php
                    $array_size = sizeof($category['packages']);
                    $count = 0;
                    
                    for ($i = 0; $i < $array_size / 2; $i++) {
                    ?>
                    <div class="row">
                    <?php for ($j = 0; $j < 2; $j++) { ?>
                       <div class="span4">
                           <a class="tile" href="<?php echo base_url('/category/package/' . $category['links'][$count]); ?>">
                               <div class="tile one" style = "background-image: url('<?php echo base_url('img/tiles') . '/' . $category['images'][$count]; ?>');">
                                   <p class="tilefont"><?php echo $category['packages'][$count]; ?></p>
                               </div>
                           </a>
                       </div>
                    <?php 
                       $count++;
                           } 
                    ?> 
                    </div>
                    <br>
                    <?php    
                        }
                    ?>
                </div> -->
               <div class="span8">
                  <?php
                  $array_size = sizeof($category['packages']);
                  $count = 0;
                  
                  for ($i = 0; $i < $array_size / 2; $i++) {
                  ?>
                  <div class="row">
                  <?php for ($j = 0; $j < 2; $j++) { ?>
                     <div class="span4">
                         <a class="tile" href="<?php echo base_url('/category/package/' . $category['links'][$count]); ?>">
                             <div class="tile one" style = "background-image: url('<?php echo base_url('img/tiles') . '/' . $category['images'][$count]; ?>');">
                                 <p class="tilefont"><?php echo $category['packages'][$count]; ?></p>
                             </div>
                         </a>
                     </div>
                  <?php 
                     $count++;
                         } 
                  ?> 
                  </div>
                  <br>
                  <?php    
                      }
                  ?>
               </div>
            </div>
        </div>
    </div>
</div>



    