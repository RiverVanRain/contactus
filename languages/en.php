<?php
/*
 *
 * Contact Us
 *
 * @author RiverVanRain
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 * @copyright (c) organiZm 2k13
 *
 * @link http://o.wzm.me/crewz/p/1983/personal-net
 *
 */

$english = array(
	'item:object:contactus' => 'Contacts',
	'admin:administer_utilities:contactus' => 'Contacted messages',
	'contactus' => 'Contact Us',
	'contactus:this' => 'Contact Us',
	'contactus:this:tooltip' => 'Contact to administrator',
	'contactus:none' => 'There is no contacted messages',
	'contactus:contact' => 'Contact to admin',
	'contactus:title' => 'Subject',
    'contactus:email' => 'Your Email',
	'contactus:deleted' => 'The contacted messages has been deleted',
	'contactus:notdeleted' => 'We were not able to delete this',
	'contactus:delete' => 'Delete',
	'contactus:areyousure' => 'Are you sure you want to delete?',
	'contactus:archive' => 'Archive',
	'contactus:archived' => 'This has been archived',
	'contactus:by' => 'Contact by',
	'contactus:objecttitle' => 'Title',
	'contactus:reason' => 'Message',
	'contactus:description' => 'Message',
	'contactus:success' => 'Your message has been sent to the site admin',
    'contactus:successanon' => 'Your message has been sent to site admin email',
	'contactus:failing' => 'Your message could not be sent',
	'contactus:contact' => 'Contact Us',
	'contactus:moreinfo' => 'More info',
	'contactus:instructions' => 'This message will be sent to the administrators of this site',
	'contactus:numbertodisplay' => 'Number of messages to display',
	'contactus:widget:description' => 'Display contacted messages',

	'contactus:failed' => 'Sorry, the attempt to contact this content has failed.',
	'contactus:notarchived' => 'We were not able to archive this message',
	'contactus:email:fail' => 'Your Email is not valid. Try again',
	
	'contactus:notloggedin' => 'The user is not logged in',
	
	//CUSTOM LOGIN/REGISTER FORM
	'user:cant:login' => 'Can\'t log in?',
	'user:cant:register' => 'Can\'t register?',
	
	//NOTIFICATIONS
	'contactus:email:subject' => 'You have a new contacted message',
	'contactus:email:body' => 'You have a contacted message from %s. It reads:

	%s
	
	%s

	To view all Contacted messages, click here:

	%s',
);

add_translation("en", $english);
