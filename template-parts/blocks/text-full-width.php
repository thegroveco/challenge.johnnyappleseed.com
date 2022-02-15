<?php

/**
 * Full-Width Text with Background Color
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'full-width-text-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'full-width-text';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$content = get_field("content") ?: "<h3>Enter Content Here</h3> <p>Fill this area with some content!</p>";
$cta = get_field("cta_button");

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col">
                <?= $content; ?>

                <?php if ($cta): ?>
                    <a href="<?= $cta['url'] ?>" class="jao-button"
                       target="<?= ($cta['target'] ?: '_self') ?>"><?= $cta['title'] ?><?php get_template_part('svg/right-arrow-long', 'dark'); ?></a>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

