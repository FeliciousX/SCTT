<?php 
    $category = array(  'name' => 'Day Tours from Kuching',
                                  'main_link' => 'day_kuching',
                                  'packages' => array( 'Kuching City Tour', 'Sarawak Cultural Village', 'Bidayuh Longhouse Experience', 'Frogs of Borneo' ),
                                  'links' => array( 'kch_city_tour', 'swk_cultural_village', 'bidayuh_longhouse', 'borneo_frogs' ),
                                  'images' => array( 'daykuching/kuching.png', 'daykuching/culturalvil.png', 'daykuching/bidayuh_longhouse.png', 'daykuching/frogs.png' )
                        );
?>

<div class="row">
    <div class="fourcol sidebar">Sidebar</div>
    <div class="twelvecol last packages">
        <div class="tilesection">
            <div class="row toppadding">
                <h1><?php echo $category['name']; ?></h1>
            </div>
            <?php
                $array_size = sizeof($category['packages']);
                $count = 0;
                if( $array_size % 2 != 0 )
                {
                    $array_size++;
                }
                $array_size /= 2;
                for( $i = 0; $i < $array_size; $i++ ) {
            ?>
            <div class="row">
                <?php for ( $j = 0; $j < 2; $j++ ) { ?>
                <a class="tile" href="package/<?php echo $category['links'][$count]; ?>">
                    <div class="eightcol tile one <?php if($j==1) { echo 'last'; } ?>" style = "background-image: url('../images/tiles/<?php echo $category['images'][$count]; ?>');">
                        <p class="tilefont"><?php echo $category['packages'][$count]; ?></p>
                    </div>
                </a>
                <?php 
                $count++;
                    } 
                ?>
            </div>   
            <?php    
                }
            ?>
             
        </div>
        <!-- <div class="row">
                <div class="eightcol">First Package</div>
                <div class="eightcol last">Second Package</div>
            </div>
            <div class="row">
                <div class="eightcol">Third Package</div>
                <div class="eightcol last">Fourth Package</div>
            </div>
            <div class="row">
                <div class="eightcol">Fifth Package</div>
                <div class="eightcol last">Sixth Package</div>
            </div>
            <div class="row">
                <div class="eightcol">Seventh Package</div>
                <div class="eightcol last">Eight Package</div>
            </div> -->
    </div>
</div>