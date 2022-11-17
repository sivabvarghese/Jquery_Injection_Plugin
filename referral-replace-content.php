<?php
/**
 * Plugin Name: Referral Replace Content
 * Description: This is a plugin to replace Referral Text.
 * Plugin URI:  https://sivacreative.com/
 * Version:     1.0.0
 * Author:      Siva Creative
 * Author URI:  https://sivacreative.com/
 * Text Domain: referral-replace-content
 * Settings URI: https://sivacreative.com/
 */
 
 if ( ! defined( 'ABSPATH' ) ) exit;
 
 
define( 'REFERRAL_REPLACE_CONTENT_PLUGIN', '1.0.0' );
define( 'REFERRAL_REPLACE_CONTENT_PREVIOUS_STABLE_VERSION', '1.0.0' );

define( 'REFERRAL_REPLACE_CONTENT__FILE__', __FILE__ );
define( 'REFERRAL_REPLACE_CONTENT_PLUGIN_BASE', plugin_basename( REFERRAL_REPLACE_CONTENT__FILE__ ) );
define( 'REFERRAL_REPLACE_CONTENT_PATH', plugin_dir_path( REFERRAL_REPLACE_CONTENT__FILE__ ) );

define( 'REFERRAL_REPLACE_CONTENT_MODULES_PATH', REFERRAL_REPLACE_CONTENT_PATH . 'modules/' );
define( 'REFERRAL_REPLACE_CONTENT_URL', plugins_url( '/', REFERRAL_REPLACE_CONTENT__FILE__ ) );
define( 'REFERRAL_REPLACE_CONTENT_ASSETS_URL', REFERRAL_REPLACE_CONTENT_URL . 'assets/' );
define( 'REFERRAL_REPLACE_CONTENT_MODULES_URL', REFERRAL_REPLACE_CONTENT_URL . 'modules/' );
 


 
class REFERRAL_REPLACE_CONTENT {

	private $replacements;

	private $settings;
	
	
	public function __construct() {
		
		add_action( 'plugins_loaded', array( $this, 'init' ) );
		//add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
		//add_action('admin_enqueue_scripts', array( $this,'admin_REFERRAL_REPLACE_CONTENT_js_siva'));
		
	}
	
	public function init() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'referral_replace_content_scripts' ) );
	//	add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
		//add_action('admin_enqueue_scripts', array( $this,'admin_REFERRAL_REPLACE_CONTENT_js_siva'));
	}
	


public function referral_replace_content_scripts() {

	$asset_file = array('dependencies' => array('wp-hooks'), 'version' => date("h:i:s"));
	wp_register_script(
		'test-js-injection',
		plugins_url( '/Referral_Text_Find_And_Replace/assets/js/locked-down-content.js' ),
		$asset_file['dependencies'],
		$asset_file['version'],
		false
	);
	/*wp_localize_script(
		'test-js-injection',
		'say_what_data_injection',
		[
			'replacements'            => $this->settings->get_flattened_replacements(),
		]
	);*/
	wp_enqueue_script( 'test-js-injection' );
/*	$script_params_referral_replace_content = [9,8,7,6,5,4,3,2,1];
	 wp_register_style( 'jQuery-UI-css', 'https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css' );
	 wp_enqueue_style('jQuery-UI-css');
	 wp_register_script( 'script_referral_replace_content', plugins_url( '/assets/js/locked-down-content.js', __FILE__ ), array ( 'jquery' ), 1.1, true);
	 wp_register_style( 'style_referral_replace_content', plugins_url( '/assets/css/locked-down-content.css', __FILE__ ));
	 wp_enqueue_style( 'style_referral_replace_content' );
	 wp_localize_script('script_referral_replace_content', 'scriptParams_referral_replace_content', $script_params_referral_replace_content);
	 wp_enqueue_script('script_referral_replace_content');*/
 
 
 
 }

 public function admin_REFERRAL_REPLACE_CONTENT_js_siva(){

	$admin_details_array = [1,1,3,5,8,13,21];
	wp_register_script( 'admin_backend_js_referral_replace_content', REFERRAL_REPLACE_CONTENT_ASSETS_URL . 'js/admin-locked-down-content.js', array ( 'jquery' ), 1.1, true);
	wp_localize_script('admin_backend_js_referral_replace_content', 'admin_details_array', $admin_details_array);
	wp_enqueue_script('admin_backend_js_referral_replace_content');
	wp_register_style( 'admin_siva_referral_replace_content_css',REFERRAL_REPLACE_CONTENT_ASSETS_URL . 'css/admin-locked-down-content.css', false, '1.0.0' );
    wp_enqueue_style( 'admin_siva_referral_replace_content_css' );

 }







	
	
	
	
} 

// Instantiate Referral Replace Content.
new REFERRAL_REPLACE_CONTENT();
