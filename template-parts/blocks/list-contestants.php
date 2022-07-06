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
$id = 'contestants-list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contestants-list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$contestants = new WP_Query([
    'post_type' => 'contestant',
    'posts_per_page' => -1
])

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row flex-wrap">
            <?php while ($contestants->have_posts()): $contestants->the_post(); ?>
                <div class="col-lg-4 col-md-6">
                    <div class="contestant-wrapper">
                        <div class="contestant-img">
                            <?= get_the_post_thumbnail(); ?>
                            <?php if ( get_field('current_rank', get_the_ID()) &&  get_field('current_rank', get_the_ID()) != 'na' ) : ?>
                                <img src="<?= get_template_directory_uri(); ?>/img/<?= get_field('current_rank', get_the_ID()); ?>-badge@2x.png" width="92" height="92" class="rank-badge">
                            <?php endif; ?>
                        </div>
                        <p><?= get_the_title(); ?></p>
                        <span>From <?= get_field("location_origin", get_the_ID()); ?></span>
                        <div class="contestant--cta">
                            <a class="jao-button" href="<?= get_the_permalink(); ?>">About Me
                                <?php
                                get_template_part('svg/right-arrow-long', 'dark');
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata(); ?>

        </div>
    </div>
</div>

