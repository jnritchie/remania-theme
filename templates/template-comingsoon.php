<?php
/**
 * Template Name: Coming Soon
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header();
?>

<style>

	.singular .entry-header {
		background:none;
	}

	.cover-header-inner {
		padding:0px;
		height:100%;
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

			get_template_part( 'template-parts/cs-cover' );
		}
	}

	?>

	<div id="join" class="pv6 bg-light-pink">
		<div class="cf mw9 center">
			<h2 class="f0 tc">Join the Network</h2>
			<div class="fl w-50 pa3">
				<p class="f2">Get periodic updates via email on progress in this sector. Whether your a consumer, patient or potential producer.</p>
			</div>
			<div class="fl w-50 pa3">
			 	<?php echo do_shortcode('[ninja_form id=3]'); ?>
			</div>
		</div>
	</div>


</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
