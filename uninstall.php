<?php
/**
 * Deletes the comment avatar options on uninstall 
 *
 * @package commentavatars
 * @subpackage uninstall
 * @since 0.1.0
 */

// If uninstall/delete not called from WordPress then exit
if ( !defined ( 'ABSPATH' ) && !defined ( 'WP_UNINSTALL_PLUGIN' ) )
	exit ();

delete_option ( 'commentavatars' );
