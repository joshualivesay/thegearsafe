<?php
    include dirname(__FILE__).'/include/head.php';
    include dirname(__FILE__).'/php/functions/bootstrap.php';
?>

<body>
<div class="site_wrapper">
  <div id="section-1"></div>
  
  <!-- masterslider -->
  <div class="master-slider ms-skin-default" id="masterslider"> 
    
    <!-- slide 1 -->
    <div class="ms-slide slide-1" data-delay="9">
      <div class="slide-pattern"></div>
      <img src="js/masterslider/blank.gif" data-src="images/sliders/masterslider/slide1.jpg" alt=""/>
      
      <h3 class="ms-layer text73"
			style="top: 230px; color: black;"
			data-type="text"
			data-delay="500"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> secure  your Shit</h3>
            
      <h3 class="ms-layer text74"
			style="top: 280px; color:black;"
			data-type="text"
			data-delay="1000"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> in this awesome thing</h3>
    </div>
    <!-- end slide 1 --> 
    
    <!-- slide 2 -->
    <div class="ms-slide slide-2" data-delay="9">
      <div class="slide-pattern"></div>
      <img src="js/masterslider/blank.gif" data-src="images/sliders/masterslider/slide2.jpg" alt=""/>
      
      <h3 class="ms-layer text73"
			style="top: 300px; left: 550px; color: black"
			data-type="text"
			data-delay="500"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> Configurable... </h3>
    </div>
    <!-- end slide 2 --> 
    
    <!-- slide 3 -->
    <div class="ms-slide slide-2" data-delay="9">
      <div class="slide-pattern"></div>
      <img src="js/masterslider/blank.gif" data-src="images/sliders/masterslider/slide3.jpg" alt=""/>
      
      <h3 class="ms-layer text73"
			style="top: 80px; color:black;"
			data-type="text"
			data-delay="500"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> ... and Stainable!</h3>
    </div>
    <!-- end slide 3 --> 

  </div>
  <!-- end of masterslider -->
  <div class="clearfix"></div>
  
  <div id="header11">
    <div class="container">
      <div class="navbar orange-4 navbar-default yamm">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle two three"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
          <a href="index.html" class="navbar-brand less-top-padding"><img src="images/logo.png" alt=""/></a> </div>
        <div id="navbar-collapse-grid" class="navbar-collapse collapse pull-right">
          <ul class="nav yellow-4 navbar-nav">
            <li><a href="javascript:void(0);" class="current dropdown-toggle" onclick="$('#section-1').animatescroll();">Home</a></li>
            <li><a href="javascript:void(0);" class="dropdown-toggle" onclick="$('#section-2').animatescroll();">About</a></li>
            <li><a href="javascript:void(0);" class="dropdown-toggle" onclick="$('#section-8').animatescroll();">Contact</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!--end menu-->
  <div class="clearfix"></div>
  
  <div id="section-2"></div>
  <section class="sec-padding section-light">
    <div class="container">
      <div class="row">
        <div class="col-md-8 text-center col-centered">
          <h2 class="uppercase">Keep your friends talking with this interesting and functional conversation piece.</h2>
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
            <h6 class=" text-orange-4 uppercase less-mar1">About</h6>
            <h3 class="uppercase">The Gear Safe</h3>
            <div class="title-line-4 orange-4 less-margin"></div>
            <div class="clearfix"></div>
            <p class="sub-title-left">Designed to function as a liquor or wine cabinet, this fully functional exposed gear safe style cabinet is the perfect accent for your modern home.</p>
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
            <br/>
            <br/>
            <form action="/php/cardprocess.php" method="POST">
              <script
                      src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                      data-key="<?php echo (LIVE) ? STRIPE_LIVE_PK : STRIPE_TEST_PK; ?>"
                      data-image="images/logo.png"
                      data-name="The Gear Safe"
                      data-description="The Gear Safe"
                      data-zip-code="true"
                      data-amount="89900"
                      data-locale="auto"
                      data-shipping-address="true"
                      data-billing-address="true"
                      data-label="Buy Now ($899 - Shipping Included)"
              >
              </script>
              <input type="hidden" name="qty" value="1" />
              <input type="hidden" name="price" value="89900" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class=" clearfix"></div>

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
