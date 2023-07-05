<!-- Footer Container
================================================== -->
<footer id="colophon" class="site-footer custom_footer dark_footer">
	<div class="container">
		<div class="row footer_widget">
				<div class="col-md-3">
					<div class="footer_widget_box neel">
						<img src="{{ asset('front/assets/img/logo1.png') }}" data-aos="fade-up" data-aos-delay="400">
						<p data-aos="fade-in" data-aos-delay="200">
						DeafxMax is established with an aim to provide customers with expert guidance in selecting the Best insurance products and plans from preferred Insurance companies in INDIA
						</p>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer_widget_box">
						<h2 data-aos="fade-up" data-aos-delay="400">Quick Links</h2>
						<ul data-aos="fade-in" data-aos-delay="200">
							<li><a href="index.php">Home</a> </li>
							<li><a href="about.php">About</a></li>
							<li><a href="services.php">Services</a></li>
							<li><a href="contact.php">Contact Us</a></li>

						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer_widget_box">
						<h2 data-aos="fade-up" data-aos-delay="400">Our Services</h2>
							<ul data-aos="fade-in" data-aos-delay="200">
							<li> <a href=" banking.php"> Medical Insurance</a>  </li>
				            <li> <a href=" finance.php"> Motor Insurance</a>  </li>
				            <li> <a href=" bpo.php"> Commercial Insurance</a>  </li>
				            <li> <a href=" pharmaceuticals.php"> Life Insurance</a>  </li>
				            <li> <a href=" hr.php"> Personal Accidental</a>  </li>
						</ul>

					</div>
				</div>

				<div class="col-md-3">
					<div class="footer_widget_box neel">
						<h2 data-aos="fade-up" data-aos-delay="400">Get In Touch</h2>
						<ul data-aos="fade-in" data-aos-delay="200">
						<li><p> <i class="fa fa-map-marker" aria-hidden="true"></i>haldia, Kokata - 721657.</p> </li>
						<li><a href="tel:+916294513591"> <i class="fa fa-phone" aria-hidden="true"></i>+91  6294513591</a> </li>
						<li><a href="mailto:deafxmax@gmail.com "> <i class="fa fa-envelope my-envelope" aria-hidden="true"></i>deafxmax@gmail.com </a> </li>
					</ul>


						<ul data-aos="fade-in" data-aos-delay="200" class="social_list">
							<li> <a href="#"><i class="fab fa-twitter"></i></a>
							</li>
							<li> <a href="#"><i class="fab fa-facebook"></i></a>
							</li>
							<li> <a href="#"><i class="fab fa-linkedin"></i></a>
							</li>
							<li> <a href="#"><i class="fab fa-youtube"></i></a>
							</li>
						</ul>

					</div>

				</div>
				<div class="col-md-12">
					<div class="footer_widget_box"  >
						<p class="copyright-text">© Copyright 2023 by DeafxMax. All rights reserved. Design and Developed by <a href=""> Clearweb Infotech </a></p>
					</div>
				</div>
			</div>
		<!-- .site-info -->
	</div>
</footer>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://api.whatsapp.com/send/?phone=918653862832&text&type=phone_number&app_absent=0" class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<!-- End Footer Container
================================================== -->

<!-- Scripts
================================================== -->
<script src="{{ asset('front/assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('front/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('front/assets/js/aos.js') }}"></script>
<script src="{{ asset('front/assets/js/custom.js') }}"></script>

<script>
	    $(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[980,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:true,
        navigationText:["<",">"],
        autoPlay:true
    });
});
</script>

<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}
</script>
</body>
</html>
