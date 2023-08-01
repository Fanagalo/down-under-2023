<?php
/*
Template Name: Front Page with Revolution Slider
*/
?>

<?php
	get_header();

	$alias = get_post_meta( get_the_ID() , 'revo_slider_alias', true );
	$alias = trim ( $alias );
	if ( ! empty( $alias ) ) {
		putRevSlider( $alias );
	}
?>

	<div class="main-content">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'home-above-map' ); ?>
			</div>
		</div><!-- /container -->

		<?php if ( 'yes' === get_theme_mod( 'maps_front_page', 'yes' ) ) {
			echo '<div id="gmaps-wide-container" class="with-margin"></div>';
		} ?>

		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'home-under-map' ); ?>
			</div>
		</div><!-- /container -->
	</div>


<?php get_footer(); ?>