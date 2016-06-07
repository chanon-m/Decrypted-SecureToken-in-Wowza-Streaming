<?php
$wowzaContentURL = 'http://u13.adintrend.com:443/live/ch3/i/ch3i.m3u8';
$wowzaContentPath = 'live/ch3/i';
$wowzaSecureToken = 'GNiMjI3MmRmYmI5YmJiN';
$wowzaTokenPrefix = 'sid';
$wowzaCustomParameter = $wowzaTokenPrefix . "CustomParameter=LaoOverSeasTV";
$wowzaSecureTokenStartTime = $wowzaTokenPrefix  ."starttime=". time() ;
$wowzaSecureTokenEndTime = $wowzaTokenPrefix  ."endtime=". (time() + (23*60*60) ); //23hr

$hashstr = $wowzaContentPath ."?". $wowzaSecureToken ."&". $wowzaSecureTokenEndTime ."&". $wowzaSecureTokenStartTime;

$hash = hash('sha256', $hashstr ,1);
$usableHash=strtr(base64_encode($hash), '+/', '-_');
$url = $wowzaContentURL ."?". $wowzaTokenPrefix ."=$usableHash";
?>

<?php header('Location: ' . $url); ?>
