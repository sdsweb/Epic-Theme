<?php
/**
 *
 * WARNING: Please do not edit this file.
 * @see http://codex.wordpress.org/Child_Themes
 *
 * Load the theme function files (options panel, theme functions, widgets, etc...).
 */
include_once get_template_directory() . '/includes/theme-options.php'; // SDS Theme Options
include_once get_template_directory() . '/includes/theme-functions.php'; // SDS Theme Options Functions
include_once get_template_directory() . '/includes/widget-social-media.php'; // SDS Social Media Widget

include_once get_template_directory() . '/includes/Epic.php'; // Epic Class (main functionality, actions/filters)


/**
 * ---------------
 * Theme Specifics
 * ---------------
 */

/**
 * Set the Content Width for embeded items.
 */
if ( ! isset( $content_width ) )
	$content_width = 765;

/**
 * This function registers all color schemes available in this theme.
 */
if ( ! function_exists( 'sds_color_schemes' ) ) {
	function sds_color_schemes() {
		$color_schemes = array(
			'default' => array( // Name used in saved option
				'label' => __( 'Default', 'epic' ), // Label on options panel (required)
				'stylesheet' => false, // Stylesheet URL, relative to theme directory (required)
				'preview' => '#565656', // Preview color on options panel (required)
				'default' => true
			),
			'slocum-blue' => array(
				'label' => __( 'Slocum Blue', 'epic' ),
				'stylesheet' => '/css/slocum-blue.css',
				'preview' => '#3c639a',
				'deps' => 'epic'
			)
		);

		return apply_filters( 'sds_theme_options_color_schemes', $color_schemes );
	}
}

/**
 * This function registers all web fonts available in this theme.
 */
if ( ! function_exists( 'sds_web_fonts' ) ) {
	function sds_web_fonts() {
		$web_fonts = array(
			// Average Sans
			'Lato:400' => array(
				'label' => 'Lato',
				'css' => 'font-family: \'Lato\', sans-serif;'
			)
		);

		return apply_filters( 'sds_theme_options_web_fonts', $web_fonts );
	}
}

/**
 * This function sets the default image dimensions string on the options panel.
 */
if ( ! function_exists( 'sds_theme_options_logo_dimensions' ) ) {
	add_filter( 'sds_theme_options_logo_dimensions', 'sds_theme_options_logo_dimensions' );

	function sds_theme_options_logo_dimensions( $default ) {
		return '500x160';
	}
}

/**
 * This function sets a default featured image size for use in this theme.
 */
if ( ! function_exists( 'sds_theme_options_default_featured_image_size' ) ) {
	add_filter( 'sds_theme_options_default_featured_image_size', 'sds_theme_options_default_featured_image_size' );

	function sds_theme_options_default_featured_image_size( $default ) {
		return 'epic-725x400';
	}
}

if ( ! function_exists( 'sds_theme_options_ads' ) ) {
	add_action( 'sds_theme_options_ads', 'sds_theme_options_ads' );

	function sds_theme_options_ads() {
	?>
		<div class="sds-theme-options-ad">
			<a href="http://slocumstudio.com/wordpress-themes/epic?utm_medium=options-panel-plug&amp;utm_campaign=WordPressThemes" target="_blank" class="sds-theme-options-upgrade-ad">
				<h2><?php _e( 'Upgrade to Epic Pro!', 'epic' ); ?></h2>
				<ul>
					<li><?php _e( 'Priority Ticketing Support', 'epic' ); ?></li>
					<li><?php _e( 'More Color Schemes', 'epic' ); ?></li>
					<li><?php _e( 'More Web Fonts', 'epic' ); ?></li>
					<li><?php _e( 'Adjust Featured Image Sizes', 'epic' ); ?></li>
					<li><?php _e( 'Easily Add Custom Scripts/Styles', 'epic' ); ?></li>
					<li><?php _e( 'and More!', 'epic' ); ?></li>
				</ul>

				<span class="sds-theme-options-btn-green"><?php _e( 'Upgrade Now!', 'epic' ); ?></span>
			</a>
		</div>
	<?php
	}
}

if ( ! function_exists( 'sds_theme_options_upgrade_cta' ) ) {
	add_action( 'sds_theme_options_upgrade_cta', 'sds_theme_options_upgrade_cta' );

	function sds_theme_options_upgrade_cta( $type ) {
		switch( $type ) :
			case 'color-schemes':
			?>
				<p><?php printf( __( '%1$s and receive more color schemes!', 'epic' ), '<a href="http://slocumstudio.com/wordpress-themes/epic?utm_medium=options-panel-plug&amp;utm_campaign=WordPressThemes" target="_blank">Upgrade to Epic Pro</a>' ); ?></p>
			<?php
			break;
			case 'web-fonts':
			?>
				<p><?php printf( __( '%1$s to use more web fonts!', 'epic' ), '<a href="http://slocumstudio.com/wordpress-themes/epic?utm_medium=options-panel-plug&amp;utm_campaign=WordPressThemes" target="_blank">Upgrade to Epic Pro</a>' ); ?></p>
			<?php
			break;
			case 'help-support':
			?>
				<p><?php printf( __( '%1$s to receive priority ticketing support!', 'epic' ), '<a href="http://slocumstudio.com/wordpress-themes/epic?utm_medium=options-panel-plug&amp;utm_campaign=WordPressThemes" target="_blank">Upgrade to Epic Pro</a>' ); ?></p>
			<?php
			break;
		endswitch;
	}
}

if ( ! function_exists( 'sds_theme_options_help_support_tab_content' ) ) {
	add_action( 'sds_theme_options_help_support_tab_content', 'sds_theme_options_help_support_tab_content' );

	function sds_theme_options_help_support_tab_content( ) {
	?>
		<p><?php printf( __( 'If you\'d like to create a suppport request, please visit the %1$s.', 'epic' ), '<a href="http://wordpress.org/themes/epic" target="_blank">Epic Forums on WordPress.org</a>' ); ?></p>
	<?php
	}
}

if ( ! function_exists( 'sds_copyright_branding' ) ) {
	add_filter( 'sds_copyright_branding', 'sds_copyright_branding', 10, 2 );

	function sds_copyright_branding( $text, $theme_name ) {
		return '<a href="http://slocumstudio.com/wordpress-themes/epic-free/" target="_blank">' . sprintf( __( '%1$s by Slocum Design Studio', 'epic' ), $theme_name ) . '</a>';
	}
}