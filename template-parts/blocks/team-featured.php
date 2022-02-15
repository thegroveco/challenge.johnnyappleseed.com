<?php

/**
 * Header Stage Block.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-featured-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-featured image-text';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$col_order = (get_field("is_reverse_order") ? " order-lg-2" : "");
$content = (get_field("bio") ?: "<p>Enter your team member biography description in this section.</p>");
$image = (get_field("image") ? get_field("image")['url'] : "/wp-content/uploads/2022/02/climate-farming-in-action.jpg");
$position = get_field("title");
$image_alt = (get_field("image") ? get_field("image")['alt'] : 'Placeholder Image');

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-6<?= $col_order; ?>">
                <div class="image<?= $image_decor; ?>">
                    <img src="<?= $image; ?>" alt="<?= $image_alt; ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content">
                    <?php if ($position): ?>
                        <span><?= $position; ?></span>
                    <?php endif; ?>
                    <h3><?= get_field("name"); ?></h3>
                    <p><?= $content; ?></p>
                </div>
            </div>

        </div>
    </div>
</div>
