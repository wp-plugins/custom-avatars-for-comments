<?php
/**
 * Admin class
 *
 * @package commentavatars
 * @subpackage admin
 * @since 0.0.2
 */
class CommentAvatarsAdmin extends CommentAvatars {

	/**
	 * Path to the main plugin file
	 *
	 * @since 0.0.2
	 * @var string
	 */
	var $plugin_file;

	/**
	 * PHP 4 Style constructor which calls the below PHP5 Style Constructor
	 *
	 * @since 0.0.2
	 * @return none
	 */
	function CommentAvatarsAdmin() {
		$this->__construct();
	}

	/**
	 * Setup backend functionality in WordPress
	 *
	 * @return none
	 * @since 3.0.0.0
	 */
	function __construct () {
		CommentAvatars::__construct ();

		// Full path to main file
		$this->plugin_file = dirname ( dirname ( __FILE__ ) ) . '/comment_avatars.php';

		// Load localizations if available
		load_plugin_textdomain ( 'custom-avatars-for-comments' , false , 'custom-avatars-for-comments/translations' );

		// Activation hook
		register_activation_hook ( $this->plugin_file , array ( &$this , 'init' ) );

		// Whitelist options
		add_action ( 'admin_init' , array ( &$this , 'register_settings' ) );

		// Activate the options page
		add_action ( 'admin_menu' , array ( &$this , 'add_page' ) ) ;
	}

	/**
	 * Whitelist the commentavatars options
	 *
	 * @since 0.0.2
	 * @return none
	 */
	function register_settings () {
		register_setting( 'commentavatars_options' , 'commentavatars' );
	}

	/**
	 * Return plugin default config
	 *
	 * @since 0.0.2
	 * @return array
	 */
	function defaults () {
		$defaults = array (
				'version'			=>	'0.1.0',
				'usedefaultpng'		=>	'0',
				'hidedefaultpng'	=>	'0',
				'selectfirst'		=>	'0',
				'useplugincss'		=>	'1',
				'showhomelink'		=>	'1',
				'size'				=>	'',
				'bordercolor'		=>	'',
				'selectlabel'		=>	__( 'Pick an avatar:', 'custom-avatars-for-comments' ),
		);
		return $defaults;
	}

	/**
	 * Initialize the default options during plugin activation
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function init () {
		if ( ! get_option ( 'commentavatars' ) )
			add_option ( 'commentavatars' , $this->defaults () );
	}

	/**
	 * Add the options page
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function add_page () {
		if ( current_user_can ( 'manage_options' ) && function_exists ( 'add_options_page' ) ) {
			$options_page = add_options_page ( __( 'Comment Avatars' , 'custom-avatars-for-comments' ) , __( 'Comment Avatars' , 'custom-avatars-for-comments' ) , 'manage_options' , 'commentavatars' , array ( &$this , 'admin_page' ) );
			add_action( 'admin_head-' . $options_page, array( &$this, 'css' ) );
			add_filter( 'ozh_adminmenu_icon_commentavatars', array ( &$this , 'commentavatars_icon' ));
		}
	}

	/**
	 * Load admin CSS style
	 *
	 * @since 0.0.2
	 * @todo isn't there some admin enqueue style function?
	 */
	function css() { ?>
		<link rel="stylesheet" href="<?php echo WP_PLUGIN_URL . '/custom-avatars-for-comments/css/admin.css?v=0.2.2' ?>" type="text/css" media="all" /> <?php
	}

	/**
	 * Return admin menu icon
	 *
	 * @return string path to icon
	 *
	 * @since 0.0.2
	 */
	function commentavatars_icon() {
		$url = $this->plugin_url();
		$url .= '/pic/group.png';
		return $url;
	}

	/**
	 * Output the options page
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function admin_page () { ?>
		<div id="nkuttler" class="wrap" >
			<h2><?php _e( 'Custom Avatars For Comments', 'custom-avatars-for-comments' ) ?></h2> <?php
			require_once( 'nkuttler.php' );
			nkuttler0_2_2_links( 'custom-avatars-for-comments' ) ?>

			<p> <?php
				_e( 'With this plugin your visitors can select from a list of custom avatars when they leave a comment. This plugin does <strong>not</strong> work out of the box, you <strong>need</strong> to modify your theme and upload avatars first. Please see the included readme.txt for instructions.', 'custom-avatars-for-comments' ); ?>
			</p>

			<?php
			if ( !is_dir( WP_CONTENT_DIR . '/commentavatars/' ) ) { ?>
				<div class="error"> <?php
					_e( 'No <code>wp-content/commentavatars/</code> directory exists. Please create it and upload some avatars.', 'custom-avatars-for-comments' ); ?>
				</div> <?php
			} else { ?>
				<p> <?php
					_e( 'You can upload additional avatars to <code>wp-content/commentavatars/</code> any time. Please don\'t delete existing ones, as that will lead to broken image links if they were already used.', 'custom-avatars-for-comments' ); ?>
				</p> <?php
			} ?>

        	<form method="post" action="options.php"> <?php
				settings_fields( 'commentavatars_options' ); ?>
				<table class="form-table" id="clearnone" >

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Label for the avatar select list", 'custom-avatars-for-comments' ) ?>
						</th>
						<td>
							<input type="text" name="commentavatars[selectlabel]" value="<?php echo $this->options['selectlabel']; ?>" size="50" />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Automatically select first custom avatar in the list by default? This will effectively disable gravatars.", 'custom-avatars-for-comments' ) ?>
						</th>
						<td>
							<input name="commentavatars[selectfirst]" type="checkbox" value="1" <?php checked( '1', $this->options['selectfirst'] ); ?> />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Use a default.png if no custom avatar is selected? You'll need to have a default.png file in the avatars directory. This will disable gravatars.", 'custom-avatars-for-comments' ) ?>
						</th>
						<td>
							<input name="commentavatars[usedefaultpng]" type="checkbox" value="1" <?php checked( '1', $this->options['usedefaultpng'] ); ?> />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Hide the default.png in the custom avatar select list?", 'custom-avatars-for-comments' ) ?>
						</th>
						<td>
							<input name="commentavatars[hidedefaultpng]" type="checkbox" value="1" <?php checked( '1', $this->options['hidedefaultpng'] ); ?> />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Use the default CSS styles that come with this plugin?", 'custom-avatars-for-comments' )?>
						</th>
						<td>
							<input name="commentavatars[useplugincss]" type="checkbox" value="1" <?php checked( '1', $this->options['useplugincss'] ); ?> />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Add this value as width and height attributes to the avatar &lt;img&gt; tags (e.g. '44px').", 'custom-avatars-for-comments' ) ?>
						</th>
						<td>
							<input type="text" name="commentavatars[size]" value="<?php echo $this->options['size']; ?>" />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Use this field to force a different color for the border of the selected avatar (e.g. '#ff0000').", 'custom-avatars-for-comments' ) ?>
						</th>
						<td>
							<input type="text" name="commentavatars[bordercolor]" value="<?php echo $this->options['bordercolor']; ?>" />
						</td>
					</tr>

					<tr valign="top">
						<th scope="row"> <?php
							_e( "Show the link to the plugin page in the footer?", 'custom-avatars-for-comments' )?>
						</th>
						<td>
							<input name="commentavatars[showhomelink]" type="checkbox" value="1" <?php checked( '1', $this->options['showhomelink'] ); ?> />
						</td>
					</tr>

				</table>

				<p class="submit">
					<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        	    </p>
        	</form>

		</div> <?php
	}
}
