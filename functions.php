<?php
if (!defined("ABSPATH")) {
    exit();
}

// LOADING ACF SETTINGS
include_once get_stylesheet_directory() . "/inc/acf/acf-config.php";

// CUSTOM ENDPOINT
require_once get_stylesheet_directory() . "/inc/api/toplevel-navbar.api.php";
require_once get_stylesheet_directory() . "/inc/api/toplevel-footer.api.php";

function custom_theme_scripts()
{
    wp_enqueue_style(
        "main-stylesheet",
        get_template_directory_uri() . "/assets/style/main.css",
        [],
        wp_get_theme()->get("Version"),
    );
    wp_enqueue_style(
        "splde-style",
        "https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css",
        [],
    );

    wp_enqueue_script(
        "splide",
        "https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js",
        [],
        null,
        false,
    );
    wp_enqueue_script(
        "main-js",
        get_template_directory_uri() . "/assets/scripts/main.js",
        ["splide"],
        null,
        false,
    );

    // sophie files
    wp_enqueue_script(
        "sophie-chat-js",
        get_template_directory_uri() . "/inc/sophie/sophie-chat.js",
        ["jquery"],
        "1.0",
        true,
    );
    wp_enqueue_style(
        "sophie-chat-css",
        get_template_directory_uri() . "/inc/sophie/sophie-chat.css",
    );
}
add_action("wp_enqueue_scripts", "custom_theme_scripts");

/*-----------------------
-----BLOCK INCLUDING-----
------------------------*/
//require_once get_template_directory() . '/inc/blocks/blocks.php';

/*-------------------------------------------------------------*/
/*------------------------SVG Erlauben-------------------------*/
/*-------------------------------------------------------------*/
function add_cors_http_header()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
}

add_action("rest_api_init", function () {
    remove_filter("rest_pre_serve_request", "rest_send_cors_headers");
    add_filter("rest_pre_serve_request", function ($value) {
        add_cors_http_header();
        return $value;
    });
});

/*-------------------------------------------------------------*/
/*------------------------SVG Erlauben-------------------------*/
/*-------------------------------------------------------------*/
add_filter(
    "wp_check_filetype_and_ext",
    "my_svgs_disable_real_mime_check",
    10,
    4,
);
function my_svgs_disable_real_mime_check($data, $file, $filename, $mimes)
{
    $wp_filetype = wp_check_filetype($filename, $mimes);
    $ext = $wp_filetype["ext"];
    $type = $wp_filetype["type"];
    $proper_filename = $data["proper_filename"];
    return compact("ext", "type", "proper_filename");
}
add_filter("upload_mimes", function ($mime_types) {
    $mime_types["svg"] = "image/svg+xml";
    $mime_types["eps"] = "application/postscript";
    $mime_types["json"] = "application/json";
    $mime_types["obj"] = "model/obj";
    $mime_types["fbx"] = "model/fbx";
    return $mime_types;
});

/*-------------------------------------------------------------*/
/*------------------------Disavle comments-------------------------*/
/*-------------------------------------------------------------*/
// Disable comments completely
function disable_comments_post_types_support()
{
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, "comments")) {
            remove_post_type_support($post_type, "comments");
            remove_post_type_support($post_type, "trackbacks");
        }
    }
}
add_action("admin_init", "disable_comments_post_types_support");

// Close comments on the front-end
function disable_comments_status()
{
    return false;
}
add_filter("comments_open", "disable_comments_status", 20, 2);
add_filter("pings_open", "disable_comments_status", 20, 2);

// Hide existing comments
function disable_comments_hide_existing_comments($comments)
{
    $comments = [];
    return $comments;
}
add_filter("comments_array", "disable_comments_hide_existing_comments", 10, 2);

// Remove comments page in menu
function disable_comments_admin_menu()
{
    remove_menu_page("edit-comments.php");
}
add_action("admin_menu", "disable_comments_admin_menu");

// Redirect any user trying to access comments page
function disable_comments_admin_menu_redirect()
{
    global $pagenow;
    if ($pagenow === "edit-comments.php") {
        wp_redirect(admin_url());
        exit();
    }
}
add_action("admin_init", "disable_comments_admin_menu_redirect");

// Remove comments metabox from dashboard
function disable_comments_dashboard()
{
    remove_meta_box("dashboard_recent_comments", "dashboard", "normal");
}
add_action("admin_init", "disable_comments_dashboard");

// Remove comments links from admin bar
function disable_comments_admin_bar()
{
    if (is_admin_bar_showing()) {
        remove_action("admin_bar_menu", "wp_admin_bar_comments_menu", 60);
    }
}
add_action("init", "disable_comments_admin_bar");
