<?php
/**
 * Template Name: Front Page Template
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header('front');
?>

<style>

	
	.admin-bar .screen-height {
    	min-height: calc(80vh - 32px);
	}

	.post-meta-wrapper {
		/* this is an annoy addition from the content-cover.php part */
		display: none;
	}



</style>
<main id="site-content" role="main">

	<?php

	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content-cover-front' );
		}
	}

	?>

	<!-- -->

	<div id="properties" class="w-100 pv6 bg-light-gray">
		<div class="container">
			<h2 class="f0 tc mb3 fw4 theme-color pb4 mt0">
				<?php echo get_field('featured_properties_tagline'); ?><!-- field text can be changed from Custom Field on home page -->
			</h2>

			<?php 

				$prod = array (
					'post_type' => 'properties',
					//'post_status' => 'published',
					'orderby' => 'published_date'				
				);

				$properties = array();
				$properties['properties'] = Timber::get_posts($prod);
				Timber::render('fp-properties-grid.twig', $properties);	

				//echo "<pre>";
				//echo print_r($properties);
				//echo "</pre>";

				//Some conditional render examples based on Advanced Custom Fields
				if ( get_field('product_section_link') != "" ) {
					echo "<div class='mt5 tc'><a class='pa4 f1 fw6 ba bw3 white b--white dim' style='text-decoration:none;' href='";
					echo get_field("product_section_link");
					echo "'>See All Bundles</a></div>";
				}

			?>
		</div>
	</div><!-- /Properties -->

	<div id="hightlights" class="pt5 pb6">
		<div class="container">
			<div class="fp-section-title text-center pb4">
				<h3 class="theme-text-regular theme-color"><span class="i">Selling or Buying</span> Your Home Has Never Been <span class="i">Easier!</span></h3>
			</div>
			<div class="row tc">
				<div class="col-lg mb4 mb0-l">
					<div class="card theme-bg shadow-4">
						<div class="icon-circle bg-white theme-color f-subheadline shadow-4"><i class="fa-solid fa-house-medical"></i></div>
						<div class="card-body text-white f2 pa4 min-h">Stay Informed Throughout the Process</div>
					</div>
				</div>
				<div class="col-lg mb4 mb0-l">
					<div class="card theme-bg shadow-4">
						<div class="icon-circle bg-white theme-color f-subheadline shadow-4"><i class="fa-solid fa-dollar-sign"></i></div>
						<div class="card-body text-white f2 pa4 min-h">Get Your Best Sale Price</div>
					</div>
				</div>
				<div class="col-lg mb4 mb0-l">
					<div class="card theme-bg shadow-4">
						<div class="icon-circle bg-white theme-color f-subheadline shadow-4"><i class="fa-solid fa-handshake-angle"></i></div>
						<div class="card-body text-white f2 pa4 min-h">Enjoy a Hassle-free Experience</div>
					</div>
				</div>
				<div class="col-lg mb4 mb0-l">
					<div class="card theme-bg shadow-4">
						<div class="icon-circle bg-white theme-color f-subheadline shadow-4"><i class="fa-solid fa-circle-check"></i></div>
						<div class="card-body text-white f2 pa4 min-h">Rely on 10 Plus Years of Experience</div>
					</div>
				</div>
				<div class="col-lg mb4 mb0-l">
					<div class="card theme-bg shadow-4">
						<div class="icon-circle bg-white theme-color f-subheadline shadow-4"><i class="fa-solid fa-circle-question"></i></div>
						<div class="card-body text-white f2 pa4 min-h">Get the Property You Want</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="featured-video" class="pv6 theme-bg text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h3 class="">Don't Just Take My Work For It, Listen to My <span class="i">Happy Customers!</span></h3>
					<div>
						<p>Listen to all these happy customers in this testimonial. Oh what a lovely testimonial it is. Truly a really good testimonial. I really like his sunglasses and his cool truck. What a cool dude.</p>

						<p>Lol what is this copy. If you want to hear more about this cool dudem click on the linke below.</p>

						<a class="i theme-link">Watch More Testimonials Here!</a>
					</div>
				</div>
				<div class="col-md-7 tc mt4 mt0-l">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/Bju7kk0rPBc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

	<div id="contact-form" class="pv6-l theme-dark-bg">
		<div class="container relative">
			<div class="row">
				<div class="col-md-4 ztop">
					<div class="card theme-bg text-white mt6 pa4 shadow-4">
						<div class="card-body f2">
							<h3 class="mv0">Contact Us</h3>
							<div class="pl3">
								<div class="mv3"><a href="#" class="theme-link no-underline"><i class="fa fa-phone"></i> 392-251-4377</a></div>
								<div class="mv3"><a href="#" class="theme-link no-underline"><i class="fa fa-envelope"></i> Email Me</a></div>
								<div>
									<i class="fa fa-marker"></i> 4571 Hamill Avenue<br/>
									San Diego, CA 92121
								</div>
							</div>
						</div>
						<div class="card-body f2">
							<h3 class="mv0">Business Hours</h3>
							<div class="pl3">
								<div class="mv3"><i class="fa fa-calendar"></i> Monday - Friday</div>
								<div class="mv3"><i class="fa fa-clock"></i> 9:00AM to 6:00PM</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 ztop bg-white bg-none-l">
					<h2 class="f1 tc theme-color">Schedule Your <span class="i">FREE</span> Consultation</h2>
					<div class="ph1 ph4-l">
			 			<?php echo do_shortcode('[ninja_form id='.get_field('form_id').']'); ?>
					</div>
				</div>
			</div>
			<div class="dn db-l bg-white w-80 absolute floating-card br3"></div>
		</div>
	</div>

</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
