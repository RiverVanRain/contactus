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

// Make sure we actually have permission to edit
if ($contact->getSubtype() == "contactus" && $contact->canEdit()) {

	// allow another plugin to override
	if (!elgg_trigger_plugin_hook('contactus:archive', 'system', array('contact' => $contact), TRUE)) {
		system_message(elgg_echo("contactus:notarchived"));
		forward(REFERER);
	}

	// change the state
	$contact->state = "archived";

	system_message(elgg_echo("contactus:archived"));

	forward(REFERER);
}
