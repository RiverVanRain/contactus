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

if ($title) {
        if(elgg_is_logged_in()) {
            $contact = new ElggObject;
            $contact->subtype = "contactus";
            $contact->owner_guid = elgg_get_logged_in_user_guid();
            $contact->title = $title;
            $contact->description = $description;
            $contact->access_id = $access;
            $current_user = elgg_get_logged_in_user_entity();
            $user_name = $current_user->name;
            $user_email = $current_user->email;
            $user_link = elgg_get_site_url() . "admin/administer_utilities/contactus";
            $access = ACCESS_PRIVATE; //this is private and only admins can see it
            if ($contact->save()) {
                    if (!elgg_trigger_plugin_hook('contactus:add', 'system', array('contact' => $contact), true)) {
                            $contact->delete();
                            register_error(elgg_echo('contactus:failed'));
                    } else {
                            $contact->state = "active";
                            system_message(elgg_echo('contactus:success'));            
                    }
            } else {
                    register_error(elgg_echo('contactus:failed'));
                    forward(REFERER);
            }
            
        } else { //Non registered user. Get details from submission. No DB Logging 
                $user_name = $user_email = get_input('email');
				if (!is_email_address($user_email)) {
					register_error(elgg_echo('contactus:email:fail'));
					forward(REFERER);
				}
				$user_link = elgg_echo('contactus:notloggedin');
				system_message(elgg_echo('contactus:successanon'));
        }
       
	   $message = elgg_echo('contactus:email:body', array(
                        $user_name,
                        $title,
                        $description,
                        $user_link
               ));
	  $site = elgg_get_site_entity();
      $subject = elgg_echo('contactus:email:subject');
                
      elgg_send_email($user_email, $site->email, $subject, $message); //In any case send email
      forward(REFERER);
} else {
	register_error(elgg_echo('contactus:failed'));
	forward(REFERER);
}