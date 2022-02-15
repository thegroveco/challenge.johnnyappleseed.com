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
$id = 'stage-header-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'stage-header';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


$title = get_the_title() ?: "Stage Header";

$stage_text = get_field("stage_text") ?: "<h1>{$title}</h1> <p>Enter your text here.</p>";
$background_image = get_field("background_image");
$scroll_cta = get_field("scroll_cta");

if($scroll_cta) {
    $className .= ' has-scroll-cta';
}
?>
<div id="<?php echo esc_attr($id); ?> "class="stage-header--wrapper<?= (get_field("include_background_overlay_offset") ? " has-crop-top" : "" ); ?>"
     style="<?= $background_image ? "background: url({$background_image}) center center/cover no-repeat;" : "background: #333"; ?>">

    <div class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="row">
                <div class="col">
                    <?= $stage_text; ?>
                    <?php if ($scroll_cta): ?>
                        <div class="scroll-cta">
                    <span>
                        <?= $scroll_cta; ?>
                    </span>
                            <?php get_template_part('svg/down-arrow', 'circle'); ?>
                            <?php if (get_field("include_guide_line")): ?>
                                <span class="guideline"></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

