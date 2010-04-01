<?php

/**
 * Frontend rlass
 *
 * @package commentavatars
 * @subpackage frontend
 * @since 0.0.2
 */

class CommentAvatarsFrontend extends CommentAvatars {

	/**
	 * Full path to the directory for the custom avatars
	 *
	 * @return string
	 * @since 0.0.2
	 */

	var $avatars_dir;

	/**
	 * PHP 4 Style constructor which calls the below PHP5 Style Constructor
	 *
	 * @since 0.0.2
	 * @return none
	 */
	function CommentAvatarsFrontend() {
		$this->__construct();
	}

	/**
	 * Setup frontend 
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function __construct () {
		CommentAvatars::__construct ();

		if ( ! empty ( $this->options ) ) {
			add_action ( 'comment_post', array( &$this, 'add_meta_settings' ), 1 );
			add_filter( 'get_avatar', array( &$this, 'filter' ), 10, 5 );
			add_action( 'wp_head', array( &$this, 'styles' ), 7 );
			add_action( 'wp_head', array( &$this, 'scripts' ), 8 );
			if ( $this->get_option( 'showhomelink' ) == '1' )
				add_action( 'wp_footer', array( &$this, 'homelink' ), 8 );
		}
	}

	/**
	 * Add CSS styles
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function styles() {
		wp_register_style( 'comment_avatars_style', WP_PLUGIN_URL . '/custom_avatars_for_comments/css/comment_avatars.css' );
		wp_enqueue_style( 'comment_avatars_style' );

		$color = $this->get_option( 'bordercolor' );
		if ( !empty( $color ) ) { ?>
			<style type="text/css">
				<!--
					#comment_avatar_select_wrapper img.selected {
						border-color: <?php echo $color ?> !important;
					}
				-->
			</style> <?php
		}
	}

	/**
	 * Add JavaScript
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function scripts() {
		wp_register_script( 'comment_avatars_js', WP_PLUGIN_URL . '/custom_avatars_for_comments/js/comment_avatars.js' );
		wp_enqueue_script( 'comment_avatars_js' );
	}

	/**
	 * Add a link to the plugin homepage in the footer
	 *
	 * @return none
	 * @since 0.0.2
	 */
	function homelink() { ?>
		<a href="http://www.nkuttler.de/wordpress/custom-avatars-for-comments/">Custom Avatars For Comments</a> <?php
	}

	function select() {
		$path = WP_CONTENT_DIR . '/commentavatars/';
		$url = WP_CONTENT_URL . '/commentavatars';

		$dir_handle = @opendir( $path );
		if ( !$dir_handle ) 
			return;

		$counter = 0;

		$label = $this->get_option ( 'selectlabel' );
		if ( !empty( $label ) ) { ?>
			<div class="comment_avatar_label">
				<label for="comment_avatar"><?php echo $label ?></label>
			</div> <?php
		} ?>

		<div id="comment_avatar_select_wrapper"> <?php
			$hidedefaultpng = $this->get_option( 'hidedefaultpng' );
			while ( $file = readdir( $dir_handle) ) {
				if( $file != '.' && $file != '..' ) {
					if ( ( $hidedefaultpng == '1' && $file != 'default.png' ) || $hidedefaultpng == '0' ) {
						echo '<input type="radio" name="comment_avatar" id="comment_avatar_select_' . $counter . '" value="' . $file . '"';
						$selectfirst = $this->get_option( 'selectfirst' );
						if ( $counter == 0 && $selectfirst == '1' )
							echo ' checked="checked" ';
						echo '/>';
	
						echo '<img src="' . $url . '/' . basename( $file ) . '" alt="Custom avatar" onclick="comment_avatars_js(' . $counter . ', this)"';
						if ( $counter == 0 && $selectfirst == '1' )
							echo ' class="selected" ';
	
						$size = $this->get_option( 'size' );
						if ( !empty( $size ) )
							echo ' width="' . $size .'" height="' . $size . '" ';
						echo '/>';
	
						echo "\n";
						$counter++;
					}
				}
			}
			closedir( $dir_handle ); ?>
		</div> <?php
	}

	function display( $avatar, $comment_ID ) {
		$comment_avatar_array = get_comment_meta( $comment_ID, 'comment_avatar' ); 
		$comment_avatar = $comment_avatar_array[0];
		$url = WP_CONTENT_URL . '/commentavatars/';
		$size = $this->get_option( 'size' );

		if ( isset( $comment_avatar ) && !empty( $comment_avatar ) ) {
			$file = WP_CONTENT_DIR . '/commentavatars/' . $comment_avatar;
			if ( file_exists( $file ) )
				$r = '<img alt="Custom avatar" src="' . $url . '/' . $comment_avatar . '" class="avatar"';
				if ( !empty( $size ) )
					$r .= ' width="' . $size .'" height="' . $size . '" ';
				$r .= '/>';
				return $r;
		}
		elseif ( $this->get_option( 'usedefaultpng' ) == '1' ) {
			$r = '<img alt="Default avatar" src="' . $url . '/default.png" class="avatar"';
			if ( !empty( $size ) )
				$r .= ' width="' . $size .'" height="' . $size . '" ';
			$r .= '/>';
			return $r;
		}
		else
			return $avatar;
	}
	
	function filter( $avatar ) {
		global $comment;
		return $this->display( $avatar, $comment->comment_ID );
	}
	
	function add_meta_settings( $post_id ) {
		add_comment_meta( $post_id, 'comment_avatar', $_POST['comment_avatar'], true );
	}

}

/*
function comment_avatars_init() {
	if ( !is_admin() ) {
	}
}
add_action( 'init', 'comment_avatars_init' );
*/
