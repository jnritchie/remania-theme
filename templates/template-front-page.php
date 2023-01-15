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

	.review-container {
		margin-top:-50px;
	}

	.icon-circle {
		border-radius: 100%;
		width:90px;
		height:90px;
		margin:auto;
		margin-top: -30px;
		padding:10px;
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

	<div id="properties" class="w-100 pv6 bg-white">
		<div class="container">
			<h2 class="f0 tc mb3"><?php echo get_field('featured_properties_tagline'); ?></h2>
			<!-- p class="tc"><?php //echo get_field('product_section_text') ?></p -->

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
				<h3><span class="i">Selling or Buying</span> Your Home Has Never Been <span class="i">Easier!</span></h3>
			</div>
			<div class="row tc">
				<div class="col">
					<div class="card">
						<div class="icon-circle bg-white theme-color f-subheadline"><i class="fa-solid fa-house-medical"></i></div>
						<div class="card-body">Blurb</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="icon-circle bg-white theme-color f-subheadline"><i class="fa-solid fa-dollar-sign"></i></div>
						<div class="card-body">Blurb</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="icon-circle bg-white theme-color f-subheadline"><i class="fa-solid fa-handshake-angle"></i></div>
						<div class="card-body">Blurb</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="icon-circle bg-white theme-color f-subheadline"><i class="fa-solid fa-circle-check"></i></div>
						<div class="card-body">Blurb</div>
					</div>
				</div>
				<div class="col">
					<div class="card">
						<div class="icon-circle bg-white theme-color f-subheadline"><i class="fa-solid fa-circle-question"></i></div>
						<div class="card-body">Blurb</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="featured-video" class="pv6 bg-navy text-white">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<h3 class="mt0">Don't Just Take My Work For It, Listen to My <span class="i">Happy Customers!</span></h3>
					<div>
						<p>Listen to all these happy customers in this testimonial. Oh what a lovely testimonial it is. Truly a really good testimonial. I really like his sunglasses and his cool truck. What a cool dude.</p>

						<p>Lol what is this copy. If you want to hear more about this cool dudem click on the linke below.</p>

						<a class="i">Watch More Testimonials Here!</a>
					</div>
				</div>
				<div class="col-md-7 tc">
					[ video embed ]
				</div>
			</div>
		</div>
	</div>

	<div id="join" class="pv6">
		<div class="container">
			<div class="row bg-white br2">
				<div class="col-md-4">
					<div class="card bg-navy text-white mt6">
						<div class="card-body">
							<h3 class="mv0">Contact Us</h3>
							<div>Phone</div>
							<div>Email Link</div>
							<div>Address</div>
						</div>
						<div class="card-body">
							<h3 class="mv0">Business Hours</h3>
							<div>Phone</div>
							<div>Email Link</div>
							<div>Address</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<h2 class="f1 tc">Schedule Your <span class="i">FREE</span> Consultation</h2>
					<div class="ph3 ph0-l">
			 			<?php echo do_shortcode('[ninja_form id='.get_field('form_id').']'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>

</main><!-- #site-content -->

<?php //get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
