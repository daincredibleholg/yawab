<?php
/*
Plugin Name: Yet Another WordPress Author Box
Plugin URI: https://github.com/daincredibleholg/yawab
Description: This is a plugin that adds one or more author boxes to the end of your WordPress posts.
Version: 1.0
Author: Holger Steinhauer
Author URI: https://steinhauer.software
*/

/*  
	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/* This code adds new profile fields to the user profile editor */
function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter URL';
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['instagram'] = 'Instagram URL';
	$profile_fields['linkedin'] = 'Linkedin URL';
	$profile_fields['dribbble'] = 'Dribbble URL';
	$profile_fields['github'] = 'Github URL';

	// Remove old fields
	unset($profile_fields['aim']);
	unset($profile_fields['yim']);
	unset($profile_fields['jabber']);
	unset($profile_fields['gplus']);

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

/* This code adds the author box stylesheet to your website */
function yawab_author_box_style()
{
	// Register the style like this for a plugin:
	wp_register_style( 'yawab-author-box', plugins_url( '/style.css', __FILE__ ), array(), '20160209', 'all' );
	// For either a plugin or a theme, you can then enqueue the style:
	wp_enqueue_style( 'yawab-author-box' );
}
add_action( 'wp_enqueue_scripts', 'yawab_author_box_style' );


/* This code adds the fontawesome css file to the footer of your website */
function fontawesome_authorbox() { ?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" />
<?php } 
add_action( 'wp_footer', 'fontawesome_authorbox' );

/* This code adds the author box to the end of your single posts */
add_filter ('the_content', 'yawab_add_post_content', 0);
function yawab_add_post_content($content) {
	if (is_single()) { 
		$content .= '
			<div class="yawabwrap">
			<div class="yawabgravatar">
				'. get_avatar( get_the_author_email(), '80' ) .'
			</div>
			<div class="yawabtext">
				<h4>Author: <span>'. get_the_author_link('display_name',get_query_var('author') ) .'</span></h4>'. get_the_author_meta('description',get_query_var('author') ) .'
			</div>
		';
		$content .= '
			<div class="yawabsocial">
			';
			if( get_the_author_meta('twitter',get_query_var('author') ) )
				$content .= '<a href="' . esc_url( get_the_author_meta( 'twitter' ) ) . '" target="_blank"><i class="fab fa-twitter"></i> Twitter</a> ';
			if( get_the_author_meta('facebook',get_query_var('author') ) )
				$content .= '<a href="' . esc_url( get_the_author_meta( 'facebook' ) ) . '" target="_blank"><i class="fab fa-facebook"></i> Facebook</a> ';
			if( get_the_author_meta('instagram',get_query_var('author') ) )
				$content .= '<a href="' . esc_url( get_the_author_meta( 'instagram' ) ) . '" target="_blank"><i class="fab fa-instagram"></i> Instagram</a> ';
			if( get_the_author_meta('linkedin',get_query_var('author') ) )
				$content .= '<a href="' . esc_url( get_the_author_meta( 'linkedin' ) ) . '" target="_blank"><i class="fab fa-linkedin"></i> Linkedin</a> ';
			if( get_the_author_meta('dribbble',get_query_var('author') ) )
				$content .= '<a href="' . esc_url( get_the_author_meta( 'dribbble' ) ) . '" target="_blank"><i class="fab fa-dribbble"></i> Dribbble</a> ';
			if( get_the_author_meta('github',get_query_var('author') ) )
				$content .= '<a href="' . esc_url( get_the_author_meta( 'github' ) ) . '" target="_blank"><i class="fab fa-github"></i> Github</a>';
		$content .= '
			</div>
			</div>
		';
	}
	return $content;
}
?>