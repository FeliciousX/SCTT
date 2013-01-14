<?php
//hardcode php values
  $tile_link = 'category.php';
  $category_list = array( array(  'name' => 'Day Tours from Kuching',
                                  'main_link' => 'day_kuching',
                                  'packages' => array( 'Kuching City Tour', 'Sarawak Cultural Village', 'Bidayuh Longhouse Experience', 'Frogs of Borneo' ),
                                  'links' => array( 'kch_city_tour', 'swk_cultural_village', 'bidayuh_longhouse', 'borneo_frogs' ),
                                  'images' => array( 'daykuching/kuching.png', 'daykuching/culturalvil.png', 'daykuching/bidayuh_longhouse.png', 'daykuching/frogs.png' )
                                  ),
                          array( 'name' => 'Overnight Tours from Kuching',
                                 'main_link' => 'overnight_kuching',
                                 'packages' => array( 'Orang Utan Conservation Programme', 'Bako National Park and Wildlife Experience', 'Iban Longhouse Safari', 'Longhouse & Batang Ai Resort' ),
                                 'links' => array( 'orang_utan_conserve', 'bako_national_park', 'iban_longhouse', 'batang_ai_resort_longhouse' ),
                                 'images' => array( 'overnight_kuching/orang_utan_conserve.png', 'overnight_kuching/bako.png', 'overnight_kuching/iban_longhouse.png', 'overnight_kuching/batang_ai.png' )
                                 )
                          );
                          // 'Overnight Tours from Miri', 'Into The Heart of Borneo From Miri', 'Across Borneo From Kuching');
?>

<?php
  foreach($category_list as $category) {
?>
<div class="container">
  <div class="row">
    <div class="span12 main-content startOpacity">
      <h2><?php echo $category['name']; ?><span><a href="<?php echo base_url('/category') . '/' . $category['main_link']; ?>">More...</a></span></h2>
      <div class="row">
        <?php for($i = 0; $i<4; $i++ ) { ?>
        <div class="span3">
          <a class="tile" href="package/<?php echo $category['links'][$i]; ?>">
            <div class="tile one <?php if($i==3) { echo 'last'; } ?>" style = "background-image: url('<?php echo base_url('img/tiles/') . '/' . $category['images'][$i]; ?>');">
              <p class="tilefont"><?php echo $category['packages'][$i]; ?></p>
            </div>
          </a>
        </div>
        <?php    
            }
        ?>
      </div>
    </div>
  </div>
</div>
      <?php
        }
      ?>


