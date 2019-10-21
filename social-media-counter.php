<?php
/* Plugin Name:       Social Media Counter
 * Plugin URI:        social-media-counter.com
 * Description:       Awesome social streams on your site
 * Version:           1.0.0
 * Author:            Artoon Solutions
 * Author URI:        https://artoonsolutions.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       social-media-counter
 * Domain Path:       /languages
 */

if(!class_exists('Social_media_counter')) :

class Social_media_counter {

	public function __construct(){
		register_activation_hook( __FILE__, array($this,'social_media_counter_activate'));
		add_action('init',array($this,'social_media_counter_text_domain'));
		add_action('admin_menu', array($this,'social_media_counter_setupmenu'));
		add_action( 'admin_init',array($this,'social_media_counter_plugin_css_and_js'));
		add_action( 'wp_enqueue_scripts', array( $this, 'social_media_counter_frontend_css' ) );
		add_shortcode( 'asmcounter', array($this,'social_media_counter_shortcode'));

	}
	public function social_media_counter_activate(){
		
		$api_settings = unserialize(get_option('social-media-counter-artoon'));
		if(empty($api_settings)){
			$smcounter =array();
			$smcounter['facebook'] = array('toggle'=>0);
			$smcounter['twitter'] = array('toggle'=>0);
			$smcounter['instagram'] = array('toggle'=>0);
			$smcounter['youtube'] = array('toggle'=>0);
			$smcounter['soundcloud'] = array('toggle'=>0);
			$smcounter['dribbble'] = array('toggle'=>0);
			update_option('social-media-counter-artoon', serialize($smcounter));
		}
		
	}
	// Register Text Domain
	public function social_media_counter_text_domain(){
		load_plugin_textdomain( 'social-media-counter', false, basename( dirname( __FILE__ ) ) . '/languages/' );
	}

	// Register Plugin Menu
	public function social_media_counter_setupmenu(){
	    add_menu_page(
	    	__( 'Social Media Counter', 'social-media-counter' ), 
	    	'Social Media Counter',  // Plugin Menu Name 
	    	'manage_options', 
			'social-media-counter', 
			array($this,'social_media_counter_plugin_settings'), 
			plugins_url( 'social-media-counter/images/smc-icon.png' )
		,80);
	}

	// Register Plugin Body
	public function social_media_counter_plugin_settings(){
    	include ('include/admin/social-media-counter-settings.php');
    }

	// Register Plugin Css And Js
	public function social_media_counter_plugin_css_and_js() {
			
		$current_url="https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$page = end(explode('/', $current_url));
		
		if($page == 'admin.php?page=social-media-counter')
		{
			// Css
	    	wp_register_style('sm_bootstrap_min_css', plugins_url('asstes/css/bootstrap.min.css',__FILE__ ));
	    	wp_enqueue_style('sm_bootstrap_min_css');
	    	wp_register_style('sm_style_css', plugins_url('asstes/css/style.css',__FILE__ ));
	    	wp_enqueue_style('sm_style_css');
	    	
	    	//wp_enqueue_style('google-font');
	    	// Js
	    	wp_register_script( 'sm_bootstrap_min_js', plugins_url('asstes/js/bootstrap.min.js',__FILE__ ));
	    	wp_enqueue_script('sm_bootstrap_min_js');
	    	wp_register_script( 'sm_custom_script', plugins_url('asstes/js/custom-script.min.js',__FILE__ ));
	    	wp_enqueue_script('sm_custom_script');
	    	wp_localize_script( 'sm_custom_script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}
	}

	//Register Front End Css
	public function social_media_counter_frontend_css(){
		wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i&display=swap');
		wp_register_style('sm_fontawesome_css', plugins_url('asstes/css/font-awesome.min.css',__FILE__ ));
		wp_enqueue_style('sm_fontawesome_css');
		wp_register_style('sm_frontend_css', plugins_url('asstes/css/frontend.min.css',__FILE__ ));
		wp_enqueue_style('sm_frontend_css');

	}

	//Social Media Counter Shortcode
	public function social_media_counter_shortcode($attr){
		ob_start();
		include('include/frontend/social-media-counter-shortcode.php');
		$html = ob_get_contents();
		ob_get_clean();
		return $html;
	}
}

$Social_media_counter = new Social_media_counter();
endif;


include ('social-media-counter-data.php');
include ('social-media-counter-widgets.php');


function jquery_mumbo_jumbo()
{
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
		jQuery( document ).ready(function() {

		    jQuery('.social_media_theam5').addClass('followers');
		    jQuery('.social_media_theam5_twitter').addClass('followers');
		    jQuery('.social_media_theam5_insta').addClass('followers');
		    jQuery('.social_media_theam5_youtube').addClass('followers');
		    jQuery('.social_media_theam5_sound').addClass('followers');
		    jQuery('.followers .fbtext').text('Followers');
		    
		    // $('.followers .theam_content').append('<padding class="follow">123</p>')
		});
	</script>
    <?php
}
add_action('wp_enqueue_scripts', 'jquery_mumbo_jumbo');
?>
