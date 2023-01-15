<?php
/**
 * Displays the content when the cover template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<?php
	// On the cover page template, output the cover header.
	$cover_header_style   = '';
	$cover_header_classes = '';

	$color_overlay_style   = '';
	$color_overlay_classes = '';

	$image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'twentytwenty-fullscreen' ) : '';

	if ( $image_url ) {
		$cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
		$cover_header_classes = ' bg-image';
	}

	// Get the color used for the color overlay.
	$color_overlay_color = get_theme_mod( 'cover_template_overlay_background_color' );
	if ( $color_overlay_color ) {
		$color_overlay_style = ' style="color: ' . esc_attr( $color_overlay_color ) . ';"';
	} else {
		$color_overlay_style = '';
	}

	// Get the fixed background attachment option.
	if ( get_theme_mod( 'cover_template_fixed_background', true ) ) {
		$cover_header_classes .= ' bg-attachment-fixed';
	}

	// Get the opacity of the color overlay.
	$color_overlay_opacity  = get_theme_mod( 'cover_template_overlay_opacity' );
	$color_overlay_opacity  = ( false === $color_overlay_opacity ) ? 80 : $color_overlay_opacity;
	$color_overlay_classes .= ' opacity-' . $color_overlay_opacity;
	?>

	<div class="cover-header <?php echo $cover_header_classes; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>"<?php echo $cover_header_style; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;) ?>>
		<div class="cover-header-inner-wrapper screen-height">
			<div class="cover-header-inner">
				<div class="cover-color-overlay color-accent<?php echo esc_attr( $color_overlay_classes ); ?>"<?php echo $color_overlay_style; //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- We need to double check this, but for now, we want to pass PHPCS ;) ?>></div>

					<header class="entry-header">
						<div class="entry-header-inner container">
							<div class="row">
								<div class="col-md-7">
								<?php

									//the_title( '<h1 class="entry-title">', '</h1>' );
									if ( get_field('hero_text') != "" ) {
										// render something else instead like a placeholder
									} else {
										echo "<h1 class='entry-title'>Are You Looking to <span class='i'>Buy or Sell? I'm Here to Help!</span></h1>";
									}

								?>
								</div>
								<div class="col-md-5">
									<?php 

										if( get_field('hero_image_item')) {
											echo "<img class='absolute rounded' style='top:-140px;' src='".get_field('hero_image_item')."'/>";
										} else {
											echo "no image uploaded";
										}

									?>
								</div>
							</div>

						</div><!-- .entry-header-inner -->
					</header><!-- .entry-header -->

			</div><!-- .cover-header-inner -->
		</div><!-- .cover-header-inner-wrapper -->
	</div><!-- .cover-header -->

	<div class="post-inner pt-0" id="post-inner">

		<div class="w-100 relative" style="z-index: 1"><!-- WAS => entry content: no thank you -->
			<div class="w-100 bg-light-gray pb5 ph3 ph5-ns">
				<div class="container">


					<?php

						//We're using the plugin to access custom data from Wordpres in a neat tidy way that follow a MVC format
						// No messy loops necessary

						$data = array (
							'post_type' => 'testimonials',
							'orderby' => 'published_date'				
						);

						$reviews = array();
						$reviews['reviews'] = Timber::get_posts($data);
						Timber::render('fp-reviews-grid.twig', $reviews);	

						// For when you need to check you data
						//echo "<pre>";
						//echo print_r($products);
						//echo "</pre>";

					?>

				</div>
			</div>
		</div><!-- WAS => .entry-content -->
		<div id="join" class="pv6">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="card text-white bg-dark">
							<div class="row">
								<div class="col-md-4">
									<div class="ph4">
									<?php 

										if( get_field('about_feature_image')) {
											echo "<img class='absolute rounded' style='top:-30px;' src='".get_field('about_feature_image')."'/>";
										} else {
											echo "no image uploaded";
										}

									?>
									</div>
								</div>
								<div class="col-md-8">
									<div class="pv4 ph5-l f2">
										<?php the_content(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();
		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .post-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );
	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article><!-- .post -->
