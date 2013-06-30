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

$contact = $vars['entity'];
$contacter = $contact->getOwnerEntity();

$archive_url = elgg_get_site_url() . "action/contactus/archive?guid=$contact->guid";
$delete_url = elgg_get_site_url() . "action/contactus/delete?guid=$contact->guid";

if ($contact->state == 'archived') {
	$contactus_background = "contacted-content-archived";
} else {
	$contactus_background = "contacted-content-active";
}

?>

<div class="contacted-content <?php echo $contactus_background; ?>">
	<div class="clearfix">
		<div class="clearfix controls">
<?php
	if ($contact->state != 'archived') {
		$params = array(
			'href' => $archive_url,
			'text' => elgg_echo('contactus:archive'),
			'is_action' => true,
			'is_trusted' => true,
			'class' => 'elgg-button elgg-button-action',
		);
		echo elgg_view('output/url', $params);
	}
	$params = array(
		'href' => $delete_url,
		'text' => elgg_echo('contactus:delete'),
		'is_action' => true,
		'is_trusted' => true,
		'class' => 'elgg-button elgg-button-action',
	);
	echo elgg_view('output/url', $params);
?>
		</div>
		<p>
			<b><?php echo elgg_echo('contactus:by'); ?>:</b>
			<?php echo elgg_view('output/url', array(
				'href' => $contacter->getURL(),
				'text' => $contacter->name,
				'is_trusted' => true,
			));
			?>,
			<?php echo elgg_view_friendly_time($contact->time_created); ?>
		</p>
		<p>
			<b><?php echo elgg_echo('contactus:objecttitle'); ?>:</b>
			<?php echo $contact->title; ?>
		</p>
		<p>
			<?php echo elgg_view('output/url', array(
				'href' => "#contact-$contact->guid",
				'text' => elgg_echo('contactus:moreinfo'),
				'rel' => "toggle",
			));
			?>
		</p>
	</div>
	<div class="contact-details hidden" id="contact-<?php echo $contact->getGUID();?>">
		<p>
			<b><?php echo elgg_echo('contactus:reason'); ?>:</b>
			<?php echo $contact->description; ?>
		</p>
	</div>
</div>
