<?php
/**
 * Template Name: Blog Grid
 * Template Post Type: post, page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0
 */

get_header('front');
?>

<style>

	/*
	.singular .entry-header {
		background:none;
	}

	.cover-header-inner {
		padding:0px;
		height:100%;
	}

	.post-meta-wrapper {
		/* this is an annoy addition from the content-cover.php part 
		display: none;
	}
	*/

</style>
<main id="site-content" role="main">

	<?php

	//if ( have_posts() ) {

		//while ( have_posts() ) {
			//the_post();

			//get_template_part( 'template-parts/content-cover-front' );
		//}
	//}

	?>

	<div id="join" class="pv6 bg-light-pink">
		<div class="cf mw9 center">
			<h2 class="f0 tc">EX Photo Blog</h2>
			<div class="">
				<p class="f2 tc">To keep our skills sharp we stay on-top of what's going on in the industry and also build case-studies based on previous projects. All of which you can find here.</p>
			</div>
		</div>
	</div>

	<div id="postgrid" class="pv6">
		<div class="cf mw9 center">
			<?php 

				$blog = array (
					'post_type' => 'post',
					//'post_status' => 'published',
					'orderby' => 'published_date'				
				);

				$posts = array();
				$posts['posts'] = Timber::get_posts($blog);
				Timber::render('post-grid.twig', $posts);	

				//echo "<pre>";
				//echo print_r($products);
				//echo "</pre>";

			?>
		</div>
	</div>


</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
