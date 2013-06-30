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

$list = elgg_list_entities(array(
	'type' => 'object',
	'subtype' => 'contactus',
	'limit' => $vars['entity']->num_display,
	'pagination' => false,
));
if (!$list) {
	$list = '<p class="mtm">' . elgg_echo('contactus:none') . '</p>';
}

echo $list;