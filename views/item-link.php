<?php if (!defined('FW')) die('Forbidden');
/**
 * @var WP_Post $item
 * @var string $title
 * @var array $attributes
 * @var object $args
 * @var int $depth
 */

if (
	fw()->extensions->get('megamenu')->show_icon()
	&&
	($icon = fw_ext_mega_menu_get_meta($item, 'icon'))
) {
	if (empty($attributes['class'])) {
		$attributes['class'] = $icon;
	} else {
		$attributes['class'] .= ' ' . $icon;
	}
}

if (
	fw()->extensions->get('megamenu')->show_button()
	&&
	($button = fw_ext_mega_menu_get_meta($item, 'button'))
) {
	if (empty($attributes['class'])) {
		$attributes['class'] = 'button button-sm';
	} else {
		$attributes['class'] .= ' button button-sm';
	}
}

echo $args->before;
echo fw_html_tag('a', $attributes, $args->link_before . $title . $args->link_after);
echo $args->after;