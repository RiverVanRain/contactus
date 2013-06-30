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

$guid = (int) get_input('guid');

$contact = get_entity($guid);

if ($contact->getSubtype() == "contactus" && $contact->canEdit()) {

	if (!elgg_trigger_plugin_hook('contactus:delete', 'system', array('contact' => $contact), TRUE)) {
		register_error(elgg_echo("contactus:notdeleted"));
		forward(REFERER);
	}

	if ($contact->delete()) {
		system_message(elgg_echo("contactus:deleted"));
	} else {
		register_error(elgg_echo("contactus:notdeleted"));
	}
	
	forward(REFERER);
}
