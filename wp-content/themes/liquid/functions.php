<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
	'lib/blade.php',      // Laravel's Blade templating engine
  'lib/assets.php',     // Scripts and stylesheets
  'lib/extras.php',     // Custom functions
  'lib/setup.php',      // Theme setup
  'lib/titles.php',     // Page titles
  'lib/navigation.php', // Foundation 5 Navigation
  'lib/pagination.php', // Foundation 5 Pagination
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
