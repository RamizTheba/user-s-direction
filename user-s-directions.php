<?php
/**
 * @package  AlecadddPlugin
 */
/*
Plugin Name: User's direction
Plugin URI: http://helloworld.com
Description:This plugin will help redirect the user to a page based on the thair role.
Version: 1.0.0
Author: Ramiz Theba
Author URI: http://helloworld.com
License: GPLv2 or later
Text Domain: alecaddd-plugin
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
Copyright 2005-2015 Automattic, Inc.
*/
defined( 'ABSPATH' ) or die( 'Hey, what are you doing here? You silly human!' );
class UD_Activation_process
{
	function __construct() {
        
        // enqueue script and styles
        add_action('admin_enqueue_scripts', array( $this, 'UD_enqueue_script_and_style') );  
        
        //Generate wp admin menu
        add_action( 'admin_menu', array( $this, 'UD_generate_wp_admin_menu' ) );
        

    }
    
	function activate() {
        
        // enque script and style while plugin activate
        $this->UD_enqueue_script_and_style();                
        
        // generated a Page on wp dashbaord
        $this->UD_generate_wp_admin_menu();

		// flush rewrite rules
        flush_rewrite_rules();
        
	}
	function deactivate() {
		// flush rewrite rules
		flush_rewrite_rules();
	}
	function uninstall() {
		// delete CPT
		// delete all the plugin data from the DB
    }


    // enqueue script and styles
    function UD_enqueue_script_and_style(){

        $current_screen = get_current_screen();
        
        if ( strpos($current_screen->base, 'user-s-direction')  === false) {
            return;
        }else{
            
            // styles 
            wp_enqueue_style('bootstrap_4_css', plugins_url('assets/css/bootstrap.min.css',__FILE__ ));
            wp_enqueue_style('bootstrap_4_grid_css', plugins_url('assets/css/bootstrap-grid.min.css',__FILE__ ));
            wp_enqueue_style('US_custom_css', plugins_url('assets/css/UD_custom.css',__FILE__ ));

            // scripts
            wp_enqueue_script('bootstrap_4_js', plugins_url('assets/js/bootstrap.min.js',__FILE__ ), ['jquery'], time(), true);
            wp_enqueue_script('bootstrap_4_bundle_js', plugins_url('assets/js/bootstrap.bundle.min.js',__FILE__ ), ['jquery'], time(), true);
            wp_enqueue_script('jquery_addable_js', plugins_url('assets/js/jquery-addable.js',__FILE__ ), ['jquery'], time(), true);
            wp_enqueue_script('sweetalert_js', plugins_url('assets/js/sweetalert.min.js',__FILE__ ), ['jquery'], time(), true);
            wp_enqueue_script('UD_custom_js', plugins_url('assets/js/UD_custom.js',__FILE__ ), ['jquery'], time(), true);
            //wp_enqueue_script('ln_script', plugins_url('inc/main_script.js', __FILE__), ['jquery'], false, true);
        
        } 
        
        
    }
    
    function UD_generate_wp_admin_menu(){
        // <span class="dashicons dashicons-randomize"></span>
        // <span class="dashicons dashicons-redo"></span>
        $page_title = 'User\'s Direction Dashboard';
		$menu_title = 'User\'s Direction';
		$capability = 'manage_options';  
		$menu_slug  = 'user-s-direction';
		$function   =  array( $this, 'UD_admin_settings_page' );
		$icon_url   = 'dashicons-redo';
		$position   = 4;
		
		add_menu_page( $page_title,   $menu_title,    $capability,    $menu_slug,    $function,    $icon_url,    $position );

    }


    function UD_admin_settings_page(){
        include( plugin_dir_path( __FILE__ ) . "admin/setting-page.php" );
    }

    // create cutom post type while activate plugin 
    // function custom_post_type() {
	// 	register_post_type( 'book', array( 'public' => true, 'label' => 'Books' ) );
    // }
    
}
if ( class_exists( 'UD_Activation_process' ) ) {
	$UD_Activation_process = new UD_Activation_process();
}
// activation
register_activation_hook( __FILE__, array( $UD_Activation_process, 'activate' ) );
// deactivation
register_deactivation_hook( __FILE__, array( $UD_Activation_process, 'deactivate' ) );
// uninstall