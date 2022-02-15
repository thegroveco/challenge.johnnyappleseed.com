<?php

/**
 * List of Contestants.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'social-links-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'social-links';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

//@TODO Padding variances via ACF?

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
        <?php foreach(get_field("social_media_links") as $social): ?>
               <a aria-label="Visit <?= "Organization's {$social['social_media_platform']}"; ?>" target="_blank" href="<?= $social["url"] ?>">
                   <?php get_template_part('svg/icon', strtolower($social['social_platform'])); ?> <?= $social['social_platform'] ?>
               </a>
        <?php endforeach; ?>
</div>

