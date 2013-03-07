<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide container">
      <div class="carousel-inner">
        <div class="item active">
          <?php echo $item['img'][0]; ?>
          <?php echo $item['caption'][0]; ?>          
        </div>
        <?php for ($i=1; $i < count($item['img']); $i++) { ?>
        <div class="item">
          <?php echo $item['img'][$i]; ?>
          <?php echo $item['caption'][$i]; ?>          
        </div>
        <?php } // end for $i loop ?> 
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
<!-- /.carousel -->
