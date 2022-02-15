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
$id = 'image-text-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image-text';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$col_order = (get_field("is_reverse_order") ? " order-lg-2" : "");
$content = (get_field("content") ?: "<h3>This is a text block</h3><p>Enter your content to compliment your image right here!</p>");
$image = (get_field("image") ? get_field("image")['url'] : "/wp-content/uploads/2022/02/climate-farming-in-action.jpg");
$image_alt = (get_field("image") ? get_field("image")['alt'] : 'Placeholder Image');
$disclaimer_text = get_field("disclaimer_text");
$arrow_alt = get_field("alternate_arrow") ? " alt-arrow" : "";
$cta = get_field("cta_button");
$image_decor = (get_field("image_decor") ? " has-decor" : "");

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
                    <?= $content; ?>

                    <?php if ($disclaimer_text): ?>
                        <span class="disclaimer"><?= $disclaimer_text; ?></span>
                    <?php endif ?>

                    <?php if ($cta): ?>
                        <a href="<?= $cta['url'] ?>" class="jao-button"
                           target="<?= ($cta['target'] ?: '_self') ?>"><?= $cta['title'] ?><?php get_template_part('svg/right-arrow-long', 'dark'); ?></a>
                    <?php endif ?>
                </div>
            </div>

        </div>
    </div>
</div>
