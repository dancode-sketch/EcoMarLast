
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="{{route('home')}}"><img src="{{asset('backend/img/logo2.png')}}" alt="#"></a>
								@php
                            		$settings=DB::table('settings')->get();
                        		@endphp  
								<!-- <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a> -->
							</div>
							@php
								$settings=DB::table('settings')->get();
								$number="";
								foreach($settings as $data) {
									$number=$data->phone;
								}
							@endphp
							<p class="text">Somos una empresa dedicada a la venta y asesoría de todo lo que respecta a Motocicletas.
								Entre los cuales tenemos:</p>
								<ul style="color: white;">
									<li>🔥Implementos de protección (cascos guantes casacas botas y demás)</li>
									<li>🔥 Neumáticos</li>
									<li>🔥Luces</li>
									<li>🔥Trámites de Soats y Duplicados de Tarjetas y más.</li>
								</ul>
							<p class="call">¿Tiene alguna duda?<span><a href="https://wa.me/{{$number}}">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<!-- <div class="col-lg-2 col-md-6 col-12">
						
						<div class="single-footer links">
							<h4>Information</h4>
							<ul>
								<li><a href="{{route('about-us')}}">About Us</a></li>
								<li><a href="#">Faq</a></li>
								<li><a href="#">Terms & Conditions</a></li>
								<li><a href="{{route('contact')}}">Contact Us</a></li>
								<li><a href="#">Help</a></li>
							</ul>
						</div>
						
					</div>
					<div class="col-lg-2 col-md-6 col-12">
						
						<div class="single-footer links">
							<h4>Customer Service</h4>
							<ul>
								<li><a href="#">Payment Methods</a></li>
								<li><a href="#">Money-back</a></li>
								<li><a href="#">Returns</a></li>
								<li><a href="#">Shipping</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>
						
					</div> -->
					<div class="col-lg-4 col-md-4 col-12">
					<div class="single-footer links">
							<h4>Horario de atención</h4>
							<ul>
								<li><a>Lunes a Domingo </a></li>
								<li><a>9:30am - 7:30pm</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Contáctanos</h4>
							<!-- Single Widget -->
							<div class="contact">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3903.4029107051674!2d-77.06205668457662!3d-11.946581843299057!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105d1d384e3c6b7%3A0x82d53e49a97968b6!2sLa%2039%20Motors!5e0!3m2!1ses-419!2spe!4v1661212104766!5m2!1ses-419!2spe" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
								<ul>
									<a href="https://g.page/LA39MOTORS?share" target="_blank"><li>@foreach($settings as $data) {{$data->address}} @endforeach</li></a>
									<a href="mailto:@foreach($settings as $data) {{$data->email}} @endforeach"><li>@foreach($settings as $data) {{$data->email}} @endforeach</li></a>
									<a href="tel:@foreach($settings as $data) {{$data->phone}} @endforeach"><li>@foreach($settings as $data) {{$data->phone}} @endforeach</li></a>
								</ul>
							</div>
							<!-- End Single Widget -->
							<!-- <div class="sharethis-inline-follow-buttons"></div> -->
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © {{date('Y')}} <a href="https://facebook.com/tiendala39motors" target="_blank">La 39 Motors</a>  -  Todos los derechos reservados.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<!-- <img src="{{asset('backend/img/payments.png')}}" alt="#"> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
		// ------------------------------------------------------- //
		// Multi Level dropdowns
		// ------------------------------------------------------ //
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");


				if (!$(this).next().hasClass('show')) {
				$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
				$('.dropdown-submenu .show').removeClass("show");
				});

			});
		});
	  </script>