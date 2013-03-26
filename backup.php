<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'solidw5_solidwizewp');

/** MySQL database username */
define('DB_USER', 'solidw5_rohitm');

/** MySQL database password */
define('DB_PASSWORD', 'r4qa-uubImpreza1');

/** MySQL hostname */
define('DB_HOST', 'localhost');

exec("mysqldump -h " . DB_HOST . " -u " . DB_USER . " -p'" . DB_PASSWORD . "' " . DB_NAME . " > ./backup.sql");

?>
