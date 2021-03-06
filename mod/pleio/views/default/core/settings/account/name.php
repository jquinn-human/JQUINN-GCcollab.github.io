<?php
$user = elgg_get_page_owner_entity();
if ($user) {
    $title = elgg_echo('user:name:label');
    $content = elgg_echo('name') . ': ';
    $content .= "<b> " . $user->name . "</b>";

    echo elgg_view_module('info', $title, $content);

    // need the user's guid to make sure the correct user gets updated
    echo elgg_view('input/hidden', array('name' => 'guid', 'value' => $user->guid));
}
