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
$id = 'challenge-summary-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'challenge-summary';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


//Fields
$background_image = get_field("background_image");
$cs_content = get_field("content") ?: "<h3>Summary Goes Here</h3> <p>This is a summary description. Fill this area here to talk about the current challenges!</p>";

$challenges = new WP_Query([
    'post_type' => 'challenge',
    'posts_per_page' => 6,
]);

?>
<div id="<?php echo esc_attr($id); ?> " class="stage-header--wrapper has-crop-top"
     style="<?= $background_image ? "background: url({$background_image}) center center/cover no-repeat;" : "background: #333"; ?>">

    <div class="stage-header <?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <?= $cs_content; ?>
                </div>
                <div class="col-lg-8">
                    <div class="challenges-grid">
                        <?php while ($challenges->have_posts()): $challenges->the_post(); ?>
                            <div class="challenge">
                                <div>
                                    <img src="<?= get_field("icon", get_the_ID()); ?>" alt="" aria-role="presentation">
                                    <span><?= get_the_title(get_the_ID()); ?></span>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

