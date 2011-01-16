<?PHP

/* ====================
Seditio - Website engine
Copyright Neocrome
http://ldu.neocrome.net

[BEGIN_SED]
File=plugins/toplastseen/toplastseen.setup.php
Version=1.0
Updated=2006-Mar-26
Type=Plugin
Author=riptide
Description=Plugin to display the Top XX of the last seen users
[END_SED]

[BEGIN_SED_EXTPLUGIN]
Code=toplastseen
Name=Top last seen
Description=Plugin to display the Top XX of the last seen users
Version=1.0
Date=2006/03/26
Author=riptide
Copyright=This plugin can be used for free.
Notes=
SQL=
Auth_guests=R
Lock_guests=W12345A
Auth_members=R
Lock_members=W12345A
[END_SED_EXTPLUGIN]

[BEGIN_SED_EXTPLUGIN_CONFIG]
limit=01:string::20:20 for Top 20, 100 for Top 100, i think you got it
showtimestamp=02:select:yes,no:yes:Defines if the Timestamp should show up
[END_SED_EXTPLUGIN_CONFIG]

==================== */

if ( !defined('SED_CODE') ) { die("Wrong URL."); }

?>
