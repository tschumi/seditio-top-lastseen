<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome
http://ldu.neocrome.net

[BEGIN_SED]
File=plugins/toplastseen/toplastseen.php
Version=1.0
Updated=2006-Mar-26
Type=Plugin
Author=riptide
Description=Plugin to display the Top XX of the last seen users
[END_SED]

[BEGIN_SED_EXTPLUGIN]
Code=toplastseen
Part=main
File=toplastseen
Hooks=standalone
Tags=
Order=10
[END_SED_EXTPLUGIN]

==================== */

if (!defined('SED_CODE') || !defined('SED_PLUG')) { die('Wrong URL.'); }


if (!$cfg['plugin']['toplastseen']['limit']) { $cfg['plugin']['toplastseen']['limit'] = "10"; }

$plugin_title = $L['plu_title'].$cfg['plugin']['toplastseen']['limit'];

$sql = sed_sql_query("SELECT user_id, user_name, user_lastlog FROM $db_users WHERE user_id <> '".$usr['id']."' AND user_lastlog <> '0' AND user_maingrp > '3' ORDER BY user_lastlog DESC LIMIT ".$cfg['plugin']['toplastseen']['limit']." ");

$plugin_body .= "<table><tr><td align='center' width='40'><em>".$L['plu_rank']."</em></td><td><em>".$L['plu_username']."</em></td>";
$plugin_body .= "<td><em>".$L['plu_lastseen']."</em></td></tr>";

$ii = 1;

while ($row = sed_sql_fetcharray($sql))
	{
	$user_id = $row["user_id"];
	$user_name = $row["user_name"];
	$user_lastlog = $row["user_lastlog"];

	$plugin_body .= "<tr><td align='center'>".$ii."</td>";
	$plugin_body .= "<td><a href='users.php?m=details&id=".$user_id."'>".$user_name."</a></td>";

	$time_between_lastlog = sed_build_timegap($user_lastlog, $sys['now_offset']);
	$plugin_body .= "<td>".$time_between_lastlog;

	if ($cfg['plugin']['toplastseen']['showtimestamp'] == 'yes')
    	{ $plugin_body .= "  (".date($cfg['dateformat'],$user_lastlog+$usr['timezone']*3600).")"; }

	$plugin_body .= "</td>";

	$ii++;
	}

$plugin_body .= "</table>";

?>
