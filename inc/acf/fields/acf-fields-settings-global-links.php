<?php
add_action("acf/include_fields", function () {
    if (!function_exists("acf_add_local_field_group")) {
        return;
    }

    acf_add_local_field_group([
        "key" => "group_67053e448407e",
        "title" => "Settings | Global Links",
        "fields" => [
            [
                "key" => "field_67053e4486939",
                "label" => "Donation Link Gönner",
                "name" => "donation_link_goenner",
                "aria-label" => "",
                "type" => "url",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ],
                "default_value" => "",
                "allow_in_bindings" => 1,
                "placeholder" => "",
            ],
            [
                "key" => "field_67053e957f538",
                "label" => "Donation Link Spende",
                "name" => "donation_link_spende",
                "aria-label" => "",
                "type" => "url",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ],
                "default_value" => "",
                "allow_in_bindings" => 0,
                "placeholder" => "",
            ],
            [
                "key" => "field_67053zu57f538",
                "label" => "Donation Link Trauerspende",
                "name" => "donation_link_trauerspende",
                "aria-label" => "",
                "type" => "url",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ],
                "default_value" => "",
                "allow_in_bindings" => 0,
                "placeholder" => "",
            ],
            [
                "key" => "field_67053zu89f548",
                "label" => "Donation Link Legate",
                "name" => "donation_link_legate",
                "aria-label" => "",
                "type" => "url",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => "",
                ],
                "default_value" => "",
                "allow_in_bindings" => 0,
                "placeholder" => "",
            ],
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "general",
                ],
            ],
        ],
        "menu_order" => 0,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "top",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => true,
        "description" => "",
        "show_in_rest" => 0,
    ]);
});
