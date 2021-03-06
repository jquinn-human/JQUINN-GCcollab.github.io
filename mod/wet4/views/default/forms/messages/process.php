<?php
/**
 * Messages folder view (inbox, sent)
 *
 * Provides form body for mass deleting messages
 *
 * @uses $vars['list'] List of messages
 * 
 */

/***************************************************************************************
 * Modifications
 * Name 	Modification date 	Description
 * piet0024 2016/10/31		    #373 - Making it so the notification inbox has a mark as read button
 ****************************************************************************************/

$messages = $vars['list'];
if (!$messages) {
	echo elgg_echo('messages:nomessages');
	return true;
}

echo '<div class="messages-buttonbank mrgn-bttm-md">';

echo elgg_view('input/submit', array(
	'value' => elgg_echo('delete'),
	'name' => 'delete',
	'class' => 'btn-default data-confirm mrgn-rght-sm',
	'title' => elgg_echo('deleteconfirm:plural'),
	'data-confirm' => elgg_echo('deleteconfirm:plural')
));

if ($vars['folder'] == "inbox" || $vars['folder'] =="notifications") {
	echo elgg_view('input/submit', array(
		'value' => elgg_echo('messages:markread'),
		'name' => 'read',
	));
}

echo '</div>';

echo '<div class="messages-container">';
echo $messages;
echo '</div>';