<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://www.linkedin.com/in/amjad-kamboh/
 * @since      1.0.0
 *
 * @package    Wptooltip
 * @subpackage Wptooltip/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wptooltip
 * @subpackage Wptooltip/admin
 * @author     Amjad Kamboh <amjadkambohwp@gmail.com>
 */
class Wptooltip_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_shortcode( 'wpts_tooltip', array($this, 'wpts_tooltip_shortcode' ) );

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wptooltip_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wptooltip_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wptooltip-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wptooltip_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wptooltip_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wptooltip-admin.js', array( 'jquery' ), $this->version, false );

	}
	/**
	 * The [wpts_tooltip] shortcode.
	 *
	 * Accepts a title and will display a box.
	 *
	 * @param array  $atts    Shortcode attributes. Default empty.
	 * @param string $content Shortcode content. Default null.
	 * @param string $tag     Shortcode tag (name). Default empty.
	 * @return string Shortcode output.
	 */


	public function wpts_tooltip_shortcode( $atts = [], $content = null, $tag = '' ) {
		// normalize attribute keys, lowercase
		$atts = array_change_key_case( (array) $atts, CASE_LOWER );

		// override default attributes with user attributes
		$wpts_tooltip_atts = shortcode_atts(
			array(
				'content'	=> '',
				'link'	=> '',
				'tooltip-title' => '',
				'tooltip-content' => '',
				'tooltip-link' => '',
				'tooltip-link-text' => '',
				'tooltip-image' => '',
				'style' => '',
				'position' => '',
				'info' => '',
			), $atts, $tag
		);

		// Tooltip start box
		$outhtml = '<span class="wpts-tooltip-box ' . esc_html( $wpts_tooltip_atts['style'] ) . ' wpts-' . esc_html( $wpts_tooltip_atts['position'] ) . '">';
		if ($wpts_tooltip_atts['link']){
			$outhtml .= '<a class="wpts-tooltip-sim-content ' . esc_html( $wpts_tooltip_atts['info'] ) . '" href="' . esc_url( $wpts_tooltip_atts['link'] ) . '">';
				$outhtml .= esc_html( $wpts_tooltip_atts['content'] );
			$outhtml .= '</a>';
		}else{
			$outhtml .= '<span class="wpts-tooltip-sim-content ' . esc_html( $wpts_tooltip_atts['info'] ) . '">';
				$outhtml .= esc_html( $wpts_tooltip_atts['content'] );
			$outhtml .= '</span>';
		}
		

		$outhtml .= '<span class="wpts-tooltip-box-wrap">';
			if ($wpts_tooltip_atts['tooltip-image']){
				$outhtml .= '<img class="wpts-tooltip-image" src="' . esc_html( $wpts_tooltip_atts['tooltip-image'] ) . '" alt="' . esc_html( $wpts_tooltip_atts['tooltip-title'] ) . '">';
			}
			$outhtml .= '<span class="wpts-tooltip-title">' . esc_html( $wpts_tooltip_atts['tooltip-title'] ) . '</span>';
			$outhtml .= '<span class="wpts-tooltip-content">' . esc_html( $wpts_tooltip_atts['tooltip-content'] ) . '</span>';
			if ($wpts_tooltip_atts['tooltip-link']){
				$outhtml .= '<a href="' . esc_url( $wpts_tooltip_atts['tooltip-link'] ) . '">';
					$outhtml .= esc_html( $wpts_tooltip_atts['tooltip-link-text'] );
				$outhtml .= '</a>';
			}
		$outhtml .= '</span>';

		// Tooltip end box
		$outhtml .= '</span>';

		// return output
		return $outhtml;
	}
}
