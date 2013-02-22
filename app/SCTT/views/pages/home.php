<?php
  $counter = 0;
  foreach($str_holder_c as $category) 
  {  
?>
<div class="container">
  <div class="row">
    <div class="span12 main-content startOpacity">
      <h2><?php echo $category['c_name'] ?></h2>
      <div class="row">
        <?php for($i = 0; $i<4; $i++ ) { ?>
        <div class="span3">
          <a class="tile" href="package/<?php echo $str_holder_p[$counter][$i]['p_link_to']; ?>">
            <div class="tile one <?php if($i==3) { echo 'last'; } ?>" style = "background-image: url('<?php echo $img_url[$counter] . '/' . $str_holder_p[$counter][$i]['p_code'] . '/1.png'; ?>');">
              <p class="tilefont"><?php echo $str_holder_p[$counter][$i]['p_name']; ?></p>
            </div>
          </a>
        </div>
        <?php    
            }
        ?>
      </div>
      <ul class="pager">
         <li class="next">
            <a class="btnmore" href="<?php echo base_url('/category') . '/' . $category['c_link_to']; ?>">More &rarr;</a></span>
         </li>
      </ul>
    </div>
  </div>
</div>
<?php
    ++$counter;
  }
?>



