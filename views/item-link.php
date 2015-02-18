<?php if (!defined('FW')) die('Forbidden');

/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 * @var FW_Extension_Megamenu $megamenu
 */

$megamenu = fw()->extensions->get('megamenu');

if ($megamenu->show_icon()) {
	if ($icon = fw_ext_mega_menu_get_meta($item, 'icon')) {
		if (empty($attributes['class'])) {
			$attributes['class'] = '';
		}
		$attributes['class'] = trim($attributes['class'] . " $icon");
	}
}

// Make a menu WordPress way
echo $args->before;
echo fw_html_tag('a', $attributes, $args->link_before . $title . $args->link_after);
echo $args->after;