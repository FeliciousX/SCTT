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

<!-- <div class="row">
    <div class="sixteencol">
        <div class="row nobottompadding">
          <h2>Category Name</h2>
        </div>
        <div class="row">
          <a class="tile" href="<?php //echo $tile_link; ?>"><div class="fourcol tile one"><p class="tilefont">First Slot</p></div></a>
          <div class="fourcol tile one"><p class="tilefont">Second Slot</p></div>
          <div class="fourcol tile one"><p class="tilefont">Third Slot</p></div>
          <div class="fourcol tile one last"><p class="tilefont">Fourth Slot</p></div>
        </div>
        <div class="row nobottompadding">
          <h2>Category Name</h2>
        </div>
        <div class="row">
          <div class="fourcol tile"><p class="tilefont">Fifth Slot</p></div>
          <div class="fourcol tile"><p class="tilefont">Sixth Slot</p></div>
          <div class="fourcol tile"><p class="tilefont">Seventh Slot</p></div>
          <div class="fourcol tile last"><p class="tilefont">Eight Slot</p></div>
        </div>
        <div class="row nobottompadding">
          <h2>Category Name</h2>
        </div>
        <div class="row">
          <div class="fourcol tile"><p class="tilefont">Ninth Slot</p></div>
          <div class="fourcol tile"><p class="tilefont">Tenth Slot</p></div>
          <div class="fourcol tile"><p class="tilefont">Eleventh Slot</p></div>
          <div class="fourcol tile last"><p class="tilefont">Twelvth Slot</p></div>
        </div>
        <div class="row nobottompadding">
          <h2>Category Name</h2>
        </div>
        <div class="row">
          <div class="fourcol tile"><p class="tilefont">Thirteenth Slot</p></div>
          <div class="fourcol tile"><p class="tilefont">Fourteenth Slot</p></div>
          <div class="fourcol tile"><p class="tilefont">Fifteenth Slot</p></div>
          <div class="fourcol tile last"><p class="tilefont">Sixteenth Slot</p></div>
        </div>
    </div>
</div> -->



<?php
  foreach($category_list as $category) {
?>
<div class="row">
    <div class="sixteencol">
        <div class="tilesection">
            <div class="row nobottompadding toppadding">
            <h2><?php echo $category['name']; ?></h2>
            </div>
            <div class="row">
                <?php
                    for($i = 0; $i<4; $i++ ) {
                ?>
                <a class="tile" href="package/<?php echo $category['links'][$i]; ?>"><div class="fourcol tile one <?php if($i==3) { echo 'last'; } ?>" style = "background-image: url('images/tiles/<?php echo $category['images'][$i]; ?>');"><p class="tilefont"><?php echo $category['packages'][$i]; ?></p></div></a>
                <?php    
                    }
                ?>
            </div>
            <div class="row"><a href="category/<?php echo $category['main_link']; ?>">More</a></div>
        </div>
    </div>
</div>

<?php
  }
?>
