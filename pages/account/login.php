<?php
/**
 * Assembles and outputs a login page.
 *
 * This page serves as a fallback for non-JS users who click on the login
 * drop down link.
 *
 * If the user is logged in, this page will forward to the front page.
 *
 * @package Elgg.Core
 * @subpackage Accounts
 */

if (elgg_is_logged_in()) {
	forward('');
}

$info_box = elgg_echo("notice:paragraphe");

$title = elgg_echo('login');
/*$content = '<section class="panel panel-notice">
	<header class="panel-heading">
		<h3 class="panel-title "><span class="glyphicon glyphicon-info-sign mrgn-rght-sm"></span>'.elgg_echo("notice:title").'</h3>
	</header>
	<div class="panel-body">'
	 .elgg_echo("notice:paragraphe").
		'</div>
</section>';*/
$content .= elgg_view('core/account/login_box', array('title' => false));

if (elgg_get_config('walled_garden')) {
	elgg_load_css('elgg.walled_garden');
	$body = elgg_view_layout('walled_garden', array('content' => $content));
	echo elgg_view_page($title, $body, 'walled_garden');
} else {
	$body = elgg_view_layout('one_column', array(
		'title' => $title,
		'content' => $content,
	));
	echo elgg_view_page($title, $body);
}
