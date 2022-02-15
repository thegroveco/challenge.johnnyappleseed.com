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
$className = 'challenge-list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


//Fields
$challenges = new WP_Query([
    'post_type' => 'challenge',
    'posts_per_page' => 6,
]);

?>

<div class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <?php
        $challenge_count = 1;
        while ($challenges->have_posts()):$challenges->the_post();
            ?>
            <div class="row" id="<?= get_post_field( 'post_name', get_post() ) ?>">

                <div class="col-lg-6">
                    <div class="count"><?= sprintf('%02d', $challenge_count); ?></div>
                    <h3><?= get_the_title(); ?></h3>
                    <span><?= get_field("subtitle", get_the_ID()); ?></span>
                    <p><?= get_the_content(); ?></p>

                </div>
                <div class="col-lg-5 offset-lg-1">
                    <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
                </div>
            </div>
            <?php
            $challenge_count++;
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</div>

