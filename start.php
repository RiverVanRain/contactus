<?php
/*
 *
 * Contact Us
 *
 * @author RiverVanRain
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 * @copyright (c) weborganiZm 2k13
 *
 * @link http://weborganizm.org/crewz/p/1983/personal-net
 *
 */

elgg_register_event_handler('init', 'system', 'contactus_init');

/**
 * Initialize the plugin
 */
function contactus_init() {

	elgg_register_page_handler('contactus', 'contactus_page_handler');
	
	elgg_extend_view('css/elgg', 'contactus/css');
	elgg_extend_view('css/admin', 'contactus/admin_css');

	if (elgg_is_logged_in()) {
		$href = "javascript:elgg.forward('contactus/add');";
		
		elgg_register_menu_item('footer', array(
			'name' => 'contact_this',
			'href' => $href,
			'title' => elgg_echo('contactus:this:tooltip'),
			'text' => elgg_view_icon('contact-this') . elgg_echo('contactus:this'),
			'priority' => 500,
			'section' => 'alt',
		));
	}

	elgg_register_admin_menu_item('administer', 'contactus', 'administer_utilities');

	elgg_register_widget_type(
			'contactus',
			elgg_echo('contactus'),
			elgg_echo('contactus:widget:description'),
			'admin');

	$action_path = elgg_get_plugins_path() . "contactus/actions/contactus";
	elgg_register_action('contactus/add', "$action_path/add.php");
	elgg_register_action('contactus/delete', "$action_path/delete.php", 'admin');
	elgg_register_action('contactus/archive', "$action_path/archive.php", 'admin');
}

function contactus_page_handler($page) {
	gatekeeper();

	$content .= elgg_view_title(elgg_echo('contactus:this'));
	$content .= elgg_view_form('contactus/add');
	$sidebar = elgg_echo('contactus:instructions');

	$params = array(
		'content' => $content,
		'sidebar' => $sidebar,
	);
	$body = elgg_view_layout('one_sidebar', $params);

	echo elgg_view_page(elgg_echo('contactus:this'), $body);
	return true;
}