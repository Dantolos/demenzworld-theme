<?php

if (!defined("ABSPATH")) {
    exit(); // Exit if accessed directly.
}

if (!function_exists("is_plugin_active")) {
    include_once ABSPATH . "wp-admin/includes/plugin.php";
}
// Check if another plugin or theme has bundled ACF
if (defined("MY_ACF_PATH")) {
    return;
}

// Define path and URL to the ACF plugin.
define("MY_ACF_PATH", get_stylesheet_directory() . "/inc/acf/");
define("MY_ACF_URL", get_stylesheet_directory_uri() . "/inc/acf/");

// Option pages
include_once MY_ACF_PATH . "options/options-page-general.php";

// INCLUDE Posttypes
$posttype_directory = MY_ACF_PATH . "posttypes";
$posttype_iterator = new DirectoryIterator($posttype_directory);

// Iterate over the files
foreach ($posttype_iterator as $fileinfo) {
    if (!$fileinfo->isDot()) {
        // Skip . and ..
        $filename = $fileinfo->getFilename();
        if (substr($filename, -4) === ".php") {
            include_once MY_ACF_PATH . "posttypes/" . $filename;
        }
    }
}

// INCLUDE Fields
$fields_directory = MY_ACF_PATH . "fields";
$fields_iterator = new DirectoryIterator($fields_directory);

// Iterate over the files
foreach ($fields_iterator as $fileinfo) {
    if (!$fileinfo->isDot()) {
        // Skip . and ..
        $filename = $fileinfo->getFilename();
        if (substr($filename, -4) === ".php") {
            include_once MY_ACF_PATH . "fields/" . $filename;
        }
    }
}
