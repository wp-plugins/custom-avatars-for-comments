<?php
/*
	Copyright 2010 Nicolas Kuttler (email : wp@nicolaskuttler.de )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

Plugin Name: Custom Avatars For Comments
Author: Nicolas Kuttler
Author URI: http://www.nkuttler.de/
Plugin URI: http://www.nkuttler.de/wordpress/custom-avatars-for-comments/
Description: Add the possibility to select a custom avatars for every comment
Version: 0.2.1.1
Text Domain: custom-avatars-for-comments
*/

/**
 * @since 0.0.2
 * @package commentavatars
 * @subpackage pluginwrapper
 */
class CommentAvatars {

	/**
	 * Array containing the options
	 *
	 * @since 0.0.2
	 * @var string
	 */
	var $options;

	/**
	 * String containing the path to the avatars directory
	 *
	 * @since 0.1.2.0
	 * @var string
	 */
	var $avatars_dir;

	/**
	 * String containing the path to the avatars URL
	 *
	 * @since 0.1.2.0
	 * @var string
	 */
	var $avatars_url;

	/**
	 * Load options
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function __construct () {
		$this->options = get_option ( 'commentavatars' );
		$this->avatars_dir = WP_CONTENT_DIR . '/commentavatars/';
		$this->avatars_url = WP_CONTENT_URL . '/commentavatars/';
	} 

	/**
	 * Return a specific option value
	 *
	 * @param string $option name of option to return
	 * @return mixed 
	 * @since 0.0.2
	 */
	function get_option( $option ) {
		if ( isset ( $this->options[$option] ) )
			return $this->options[$option];
		else
			return false;
	}

	/**
	 * return plugin URL
	 *
	 * @return string
	 * @since 0.0.2
	 */
	function plugin_url () {
		return plugins_url ( plugin_basename ( dirname ( __FILE__ ) ) );
	}

}

/**
 * Instantiate the CommentAvatarsFrontend or CommentAvatarsAdmin Class
 */
if ( is_admin () ) {
	require_once ( dirname ( __FILE__ ) . '/inc/admin.php' );
	$CommentAvatarsAdmin = new CommentAvatarsAdmin ();
} else {
	require_once ( dirname ( __FILE__ ) . '/inc/frontend.php' );
	global $CommentAvatarsFrontend;
	$CommentAvatarsFrontend = new CommentAvatarsFrontend ();
}
