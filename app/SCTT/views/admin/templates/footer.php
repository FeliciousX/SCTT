
</div> <!-- End of div.container -->

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-datepicker.js'); ?>"></script>
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script>$('.date').datepicker()</script>
    <script type="text/javascript">
    // Popup window code
    function newPopup(url) {
      popupWindow = window.open(
        url,'popUpWindow','height=450,width=700,left=10,top=10,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no,status=yes')
    }
    </script>
</body>
</html>