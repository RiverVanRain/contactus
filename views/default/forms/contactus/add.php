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

$guid = 0;
$title = "";

$description = "";
$owner = elgg_get_logged_in_user_entity();

?>

<div>
	<label>
		<?php
			echo elgg_echo('contactus:title');
			echo elgg_view('input/text', array(
				'name' => 'title',
				'value' => $title,
			));
		?>
	</label>
</div>
<div>
	<label>
		<?php 	echo elgg_echo('contactus:description'); ?>
	</label>
	<?php
		echo elgg_view('input/longtext',array(
			'name' => 'description',
			'value' => $description,
		)); 
	?>
</div>
<div class="elgg-foot">
	<?php
		echo elgg_view('input/submit', array(
			'value' => elgg_echo('contactus:contact'),
		));
	?>
</div>
