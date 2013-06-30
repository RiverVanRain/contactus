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
$title = get_input('title');
$description = get_input('description');

$access = ACCESS_PRIVATE; //this is private and only admins can see it

if ($title) {

	$contact = new ElggObject;
	$contact->subtype = "contactus";
	$contact->owner_guid = elgg_get_logged_in_user_guid();
	$contact->title = $title;
	$contact->description = $description;
	$contact->access_id = $access;

	if ($contact->save()) {
		if (!elgg_trigger_plugin_hook('contactus:add', 'system', array('contact' => $contact), true)) {
			$contact->delete();
			register_error(elgg_echo('contactus:failed'));
		} else {
			system_message(elgg_echo('contactus:success'));
			$contact->state = "active";
		}
		forward($address);
	} else {
		register_error(elgg_echo('contactus:failed'));
		forward($address);
	}
} else {

	register_error(elgg_echo('contactus:failed'));
	forward($address);
}
