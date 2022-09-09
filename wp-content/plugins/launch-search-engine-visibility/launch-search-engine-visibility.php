<?php

/**
 * Plugin Name: Compulse - Auto-Configure Search Engine Visibility
 * Description: Automatically turns on/off the "Discourage search engines from indexing this site" option based on whether or not it is hosted on a WPEngine subdomain.
 * Author: Kevin Hall
 */

function cim_check_search_engine_visibility() {
	if ('on' == get_option('cim_disable_auto_check', ''))
		return;

	$siteurl = defined("WP_SITEURL") ? WP_SITEURL : get_option("siteurl");
	$visible = ("1" == get_option("blog_public"));

	if (strstr($siteurl, '.wpengine.com')) {
		// It's a WPEngine url, so it should not be visible.
		if ($visible) {
			// Turn off visibility.
			update_option("blog_public", "0");
		}
	} elseif (!$visible) {
		// It's not a WPEngine url, so make it visible.
		update_option("blog_public", "1");
	}
}
add_action("admin_init", "cim_check_search_engine_visibility");


function cim_concat_search_engine_visibility_warning_message($translation, $text, $domain) {
	if ($text == "Discourage search engines from indexing this site" && 'on' != get_option('cim_disable_auto_check', '')) {
		$translation .= '<br /><span style="font-weight:bold;">This setting is configured automatically based on the site url.<br />Automatic configuration can be disabled below.</span>';
	}

	return $translation;
}
add_filter("gettext", "cim_concat_search_engine_visibility_warning_message", 99, 3);



function cim_search_engine_option_display() { ?>
	<label for="cim_disable_auto_check"><input type="checkbox" name="cim_disable_auto_check" id="cim_disable_auto_check" <?php checked('on', get_option('cim_disable_auto_check', '')); ?> /> Disable</label>
<?php }


function cim_add_search_engine_option() {
	register_setting("reading", "cim_disable_auto_check");
	add_settings_field("cim_disable_auto_check", "Disable Automatic Configuration of Search Engine Visibility", "cim_search_engine_option_display", "reading", "default");
}
add_action("admin_init", "cim_add_search_engine_option");