<?php
    $orderid = (isset($_REQUEST['orderid'])) ? $_REQUEST['orderid'] : false;
    include dirname(__FILE__).'/php/functions/bootstrap.php';
    include dirname(__FILE__).'/include/head.php';
?>

<body>
<div class="site_wrapper">

  <div id="section-2"></div>
  <section class="sec-padding section-light">
    <div class="container">
      <div class="row">
        <div class="col-md-8 text-center col-centered">
          <h2 class="uppercase">Your order has been placed</h2>
        </div>
        <div class="title-line4 orange-4 less-margin align-center"></div>
      </div>
    </div>
  </section>
  <!-- end section -->
  <div class="clearfix"></div>

  <section class="section-side-image clearfix">
    <div class="img-holder col-md-6 col-sm-3 pull-left">
      <div class="background-imgholder" style="background:url(images/media/animated.gif);"> <img class="nodisplay-image" src="images/media/animated.gif" alt=""/> </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 col-md-offset-7 col-sm-8 col-sm-offset-4 text-inner clearfix align-left">
          <div class="text-box">
            <h6 class=" text-orange-4 uppercase less-mar1">Details</h6>
            <h3 class="uppercase">Your order is on the way!</h3>
            <div class="title-line-4 orange-4 less-margin"></div>
            <div class="clearfix"></div>
            <p class="sub-title-left">Order Number: <?php echo $orderid;?></p>
            <div class="col-md-6 col-xs-12">
              <div class="item-holder">
                <div class="icon-plain-small left"> <span class="icon-layers"></span></div>
                <div class="text-box-right less-padding-1">
                  <h5>Precision Design</h5>
                  <div class="divider-line solid light margin"></div>
                  <p>This handcrafted keepsake is meticulously designed to last for years to come.</p>
                </div>
              </div>
            </div>
            <!--end item-->

            <div class="col-md-6 col-xs-12">
              <div class="item-holder">
                <div class="icon-plain-small left"> <span class="icon-map"></span></div>
                <div class="text-box-right less-padding-1">
                  <h5>Modern and Flexible</h5>
                  <div class="divider-line solid light margin"></div>
                  <p>Solid wood construction. Flexible configuration. and modern styling.</p>
                </div>
              </div>
            </div>
            <!--end item-->
            <div class="clearfix"></div>

          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class=" clearfix"></div>



  <div class="clearfix"></div>

  <div id="section-8"></div>
  <section class="parallax-section63">
    <div class="section-overlay bg-opacity-8">
      <div class="container sec-tpadding-2 sec-bpadding-2">
        <div class="row">
          <div class="col-md-6">
            <div class="smart-forms transparent-1 bmargin">
              <form method="post" action="php/smartprocess.php" id="smart-form">
                <div>
                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="text" name="sendername" id="sendername" class="gui-input" placeholder="Enter name">
                      <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                  </div>
                  <!-- end section -->

                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="phone" name="phonenumber" id="phonenumber" class="gui-input" placeholder="Phone number">
                      <span class="field-icon"><i class="fa fa-mobile-phone"></i></span> </label>
                  </div>
                  <!-- end section -->

                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="email" name="emailaddress" id="emailaddress" class="gui-input" placeholder="Email address">
                      <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                  </div>
                  <!-- end section -->

                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="text" name="sendersubject" id="sendersubject" class="gui-input" placeholder="Enter subject">
                      <span class="field-icon"><i class="fa fa-lightbulb-o"></i></span> </label>
                  </div>
                  <!-- end section -->

                  <div class="section">
                    <label class="field prepend-icon">
                      <textarea class="gui-textarea" id="sendermessage" name="sendermessage" placeholder="Enter message"></textarea>
                      <span class="field-icon"><i class="fa fa-comments"></i></span> <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters.</span> </label>
                  </div>
                  <!-- end section -->

                  <div class="result"></div>
                  <!-- end .result  section -->

                </div>
                <!-- end .form-body section -->
                <div class="form-footer">
                  <button type="submit" data-btntext-sending="Sending..." class="button btn-primary orange-4 pull-left">Submit</button>
                  <button type="reset" class="button btn-white pull-left"> Cancel </button>
                </div>
                <!-- end .form-footer section -->
              </form>
            </div>
            <!-- end .smart-forms section -->
          </div>
          <!--end item-->

          <div class="col-md-6 text-left">
            <h2 class="text-white uppercase"><strong>Get in Touch With Us</strong></h2>
            <br/>
            <h4 class="text-white">Address Info</h4>
            <h6 class="text-white">The Gear Safe</h6>
            <p class="text-white">587 Lexington Park Blvd, OH 45040
              Telephone: +1 513-555-5555</p>

            <br/>
            <p class="text-white">E-mail: sales@thegearsafe.com</p>
            <p class="text-white">Website: www.thegearsafe.com</p>
          </div>
          <!--end item-->

        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>

  <section class="section-copyrights section-white-2 sec-moreless-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12"> <span>Copyright © 2015 thegearsafe.com All rights reserved.</span></div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>

  <a href="#" class="scrollup orange-4"></a><!-- end scroll to top of the page-->
</div>
<!-- end site wraper -->

<!-- ============ JS FILES ============ -->

<script type="text/javascript" src="js/universal/jquery.js"></script>
<script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
<script src="js/masterslider/jquery.easing.min.js"></script>
<script src="js/masterslider/masterslider.min.js"></script>
<script type="text/javascript">
(function($) {
 "use strict";
	var slider = new MasterSlider();
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('bullets');

	slider.setup('masterslider' , {
		 width:1600,    // slider standard width
		 height:800,   // slider standard height
		 space:0,
		 speed:45,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 autoplay:true,
		 view:"parallaxMask"
	});

})(jQuery);
</script>
<script>
$(function(){
   // Add click-event listener
   $("#header11 .navbar-nav li a").on("click",function(){
      // Remove the current class from all a tags
      $("#header11 .navbar-nav li a").removeClass("current");
      // Add the current class to the clicked a
      $(this).addClass("current");
   });

});
</script>
<script src="js/mainmenu/customeUI.js"></script>
<script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script>
<script type="text/javascript" src="js/cubeportfolio/main.js"></script>
<script src="js/owl-carousel/owl.carousel.js"></script>
<script src="js/owl-carousel/custom.js"></script>
<script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>
<script src="js/scrolltotop/totop.js"></script>
<script src="js/mainmenu/jquery.sticky.js"></script>
<script src="js/pagescroll/animatescroll.js"></script>

<script type="text/javascript" src="js/smart-forms/jquery.form.min.js"></script>
<script type="text/javascript" src="js/smart-forms/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/smart-forms/additional-methods.min.js"></script>
<script type="text/javascript" src="js/smart-forms/smart-form.js"></script>
<script src="js/scripts/functions.js" type="text/javascript"></script>
</body>
</html>
