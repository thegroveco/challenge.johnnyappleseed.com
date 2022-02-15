<?php

/**
 * Sponsor Callout
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'sponsor-callout-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$className = 'sponsor-callout';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$content_left = get_field("content_left") ?: "<h5>Content Area Left</h5><h3>Your Title Here</h3><p>Drop some awesome content over here!</p>";
$content_right = get_field("content_right") ?: "<h5>Content Area Right</h5><h3>Your Title Here</h3><p>Drop some awesome content over here!</p>";

$button_left = get_field("button_left");
$button_right = get_field("button_right");

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 content--left">
                <?= $content_left ?>
                <a href="<?= $button_left['url'] ?>" class="jao-button"><?= $button_left['title'] ?><?php get_template_part('svg/right-arrow-long', 'dark'); ?></a>
            </div>
            <div class="col-lg-4 content--accent">
                <img src="https://joa.336.thegrove.co/wp-content/uploads/2022/02/decor-center.png" alt="">
            </div>
            <div class="col-lg-4 content--right">
                <?= $content_right ?>
                <a href="<?= $button_right['url'] ?>" class="jao-button alt"><?= $button_right['title'] ?><?php get_template_part('svg/right-arrow-long', 'dark'); ?></a>
            </div>
        </div>
    </div>
</div>

