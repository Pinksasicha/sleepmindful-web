<div class="container">
	<?php echo Modules::run('home/hero'); ?>
	<?php echo Modules::run('home/aboutus'); ?>
	<section id="check-symptoms">
		<h1>CHECK YOUR SYMPTOMS</h1>
		<p>
			Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
		</p>
		<a class="z-depth-3" href="users/history">CHECK YOUR SYMPTOMS</a>
	</section>
	<?php echo Modules::run('blogs/home'); ?>
	<?php echo Modules::run('posts/home'); ?>
	<?php echo Modules::run('contacts/home'); ?>
</div>
<script>
	$(function() {
		var breakpoint = window.matchMedia('(min-width:992px)');
		var aboutusSwiper;
		var blogSwiper;
		var breakpointChecker = function() {
			if (breakpoint.matches === true) {
				disableSwiper();
				return;
			} else if (breakpoint.matches === false) {
				return enableSwiper();
			}
		};
		var enableSwiper = function() {
			aboutusSwiper = new Swiper('#aboutus .swiper-container', {
				loop: true,
				pagination: {
					el: '#aboutus .swiper-pagination',
				},
				breakpoints: {
					767: {
						slidesPerView: 1,
					},
					991: {
						slidesPerView: 2,
					},
					1199: {
						slidesPerView: 3,
					},
				},
			});
			blogSwiper = new Swiper('#blog .swiper-container', {
				loop: true,
				pagination: {
					el: '#blog .swiper-pagination',
				},
				breakpoints: {
					767: {
						slidesPerView: 1,
					},
					991: {
						slidesPerView: 2,
					},
					1199: {
						slidesPerView: 3,
					},
				},
			});
		};
		var disableSwiper = function() {
			if (aboutusSwiper !== undefined) {
				aboutusSwiper.destroy();
			}
			if (blogSwiper !== undefined) {
				blogSwiper.destroy();
			}
			$('.swiper-pagination').html('');
		};
		breakpoint.addListener(breakpointChecker);
		breakpointChecker();
		<?php if ($this->session->flashdata('register_thankyou')): ?>
		swal({
			title: "Thank you",
			text: "For registering to the SleepMindFul",
			type: "success",
			confirmButtonColor: "#60C9E3",
			confirmButtonText: "Close"
		});
		<?php endif; ?>
	});
</script>