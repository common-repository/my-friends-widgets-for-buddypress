<?php
/*
Plugin Name: Buddypress My Friends Widgets
Description: My Friends Widgets
Version: 1.0
Requires at least: BuddyPress 1.2
Tested up to: BuddyPress 1.2 + wp 2.9.1
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: Sarah Gooding
Author URI: http://untame.net/
Plugin URI:http://untame.net/
Site Wide Only: true
/

*/
/***

    Copyright (C) 2010 Sarah Gooding

    This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or  any later version.

    This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

    You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses>.

    */

/*** Make sure BuddyPress is loaded ********************************/
if ( !function_exists( 'bp_core_install' ) ) {
	require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'buddypress/bp-loader.php' ) )
		require_once ( WP_PLUGIN_DIR . '/buddypress/bp-loader.php' );
	else
		return;
}
/*******************************************************************/


/*** My Friends Widget (Small Avatars) *******************************/


	function bp_my_friends_small_widget ($args) {
		global $bp;

	    extract( $args );

		echo $before_widget;
		echo $before_title
		   . 'My Friends'
		   . $after_title; ?>
		  
		<?php if ( bp_has_members( 'type=newest&max=20&user_id=' . bp_loggedin_user_id() ) & is_user_logged_in() ) : ?>
			<div class="avatar-block">
				<?php while ( bp_members() ) : bp_the_member(); ?>
					<div class="item-avatar">
						<a href="<?php bp_member_permalink() ?>"><?php bp_member_avatar() ?></a>
					</div>
				<?php endwhile; ?>
			</div>
		
		<?php else: ?>

			<div class="widget-error">
				<?php _e( '<h4>Login or <a href="/register/">Signup</a> to make some friends!</h4>', 'buddypress' ) ?>
			</div>

		<?php endif; ?>

		<?php echo $after_widget; ?>
<?php
	}

/*******************************************************************/

/*** My Friends Widget (Big Avatars) *******************************/


	function bp_my_friends_big_widget ($args) {
		global $bp;

	    extract( $args );

		echo $before_widget;
		echo $before_title
		   . 'My Friends'
		   . $after_title; ?>
		  
		<?php if ( bp_has_members( 'type=newest&max=10&user_id=' . bp_loggedin_user_id() ) & is_user_logged_in() ) : ?>
			<div class="avatar-block">
				<?php while ( bp_members() ) : bp_the_member(); ?>
					
						<a href="<?php bp_member_permalink() ?>"><?php bp_member_avatar('type=full&width=82&height=82') ?></a>
					
				<?php endwhile; ?>
			</div>
		
		<?php else: ?>

			<div class="widget-error">
				<?php _e( '<h4>Login or <a href="/register/">Signup</a> to make some friends!</h4>', 'buddypress' ) ?>
			</div>

		<?php endif; ?>

		<?php echo $after_widget; ?>
<?php
	}

/*******************************************************************/




/*** Register these little widgets :) ******************************/
register_sidebar_widget('My Friends (Small Avatars)','bp_my_friends_small_widget');
register_sidebar_widget('My Friends (Big Avatars)', 'bp_my_friends_big_widget');
?>