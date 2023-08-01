<?php
/**
 * Add the link to documentation under Appearance in the wp-admin
 */

if ( ! function_exists( 'pt_add_docs_page' ) ) {
	function pt_add_docs_page() {
		add_theme_page(
			_x( 'Documentation', 'backend', 'carpress_wp' ),
			_x( 'Documentation', 'backend', 'carpress_wp' ),
			'',
			'proteusthemes-theme-docs',
			'pt_docs_page_output'
		);
	}
	add_action( 'admin_menu', 'pt_add_docs_page' );

	function pt_docs_page_output() {
		?>
		<div class="wrap">
			<h2><?php _ex( 'Documentation', 'backend', 'carpress_wp' ); ?></h2>

			<p>
				<strong><a href="http://www.proteusthemes.com/docs/carpress/" class="button button-primary " target="_blank"><?php _ex( 'Click here to see online documentation of the theme!', 'backend', 'carpress_wp' ); ?></a></strong>
			</p>
		</div>
		<?php
	}
}