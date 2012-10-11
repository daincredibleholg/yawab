<?php
/*
Plugin Name: Guerrilla's Author Box
Plugin URI: http://madebyguerrilla.com
Description: This is a plugin that adds an author box to the end of your WordPress posts.
Version: 1.0
Author: Mike Smith
Author URI: http://www.madebyguerrilla.com
*/

/*  Copyright 2012  Mike Smith (email : hi@madebyguerrilla.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


/* This code adds the author box to the single post page */
add_filter ('the_content', 'guerrilla_add_post_content', 0);
function guerrilla_add_post_content($content) {
	if (is_single()) { 
		$content .= '
		<style>
			.guerrillawrap { float: left; width: 96%; padding: 2%; background: #f8f8f8; }
			.guerrillagravatar { float: left; margin: 0 10px 0 0; }
			.guerrillatext { }
			.guerrillatext h4 { margin: 0 0 10px 0; }
		</style>
		<div class="guerrillawrap"><div class="guerrillagravatar">'. get_avatar( get_the_author_email(), '80' ) .'</div>
	<div class="guerrillatext"><h4>Author: <span>'. get_the_author_link('display_name',get_query_var('author') ) .'</span></h4>'. get_the_author_meta('description',get_query_var('author') ) .'</div>
</div>';
	}
	return $content;
}
?>