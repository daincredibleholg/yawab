=== Plugin Name ===
Contributors: madebyguerrilla
Tags: author box, author info, author
Requires at least: 3.0
Tested up to: 3.5.1
Stable tag: 1.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a plugin that adds an author box to the end of your posts, showing off the authors name, description, website link and gravatar powered avatar.

== Description ==

This is a plugin that adds an author box to the end of your posts, showing off the authors name, description, website link and gravatar powered avatar.

As of version 1.2 the following input boxes were removed: aim/yim/jabber, and the following input boxes were added: twitter/facebook/google+/linkedin

== Frequently Asked Questions ==

= Will there ever be more options added? =

Yes, I do have plans on adding more options for this plugin. For instance, I plan on adding a page in the WordPress admin panel for you to be able to edit the CSS so the author box can be styled to fit with your theme design. <strike>I also would like to remove some of the default user info (ie: AIM name, etc) and replace those with Twitter, Facebook and Google+</strike> as of version 1.2 this has been done.

= What are the default CSS codes? =

You can copy/paste the below css codes into your themes CSS file and adjust them accordingly.

	.guerrillawrap { float: left; width: 96%; padding: 2%; background: #f8f8f8; }
	.guerrillagravatar { float: left; margin: 0 10px 0 0; }
	.guerrillatext { }
	.guerrillatext h4 { margin: 0 0 10px 0; }

== Installation ==

1. Upload 'guerrilla-author-box.php' to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

== Changelog ==

= 1.1 =
* Automatically remove the aim/yim/jabber profile options
* Automatically add twitter/facebook/google+/linkedin options

= 1.2 =
* Fixed a PHP error which caused the plugin to deactivate

== Upgrade Notice ==

= 1.1 =
New version adds twitter/facebook/google+/linkedin profile options and removes some seldom used options