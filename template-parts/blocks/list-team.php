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

$members = get_field("team_members");
$mem_count = 1;

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row flex-wrap">
            <?php foreach ($members as $member): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="contestant-wrapper">
                        <img src="<?= $member['icon_image']; ?>" alt="">
                        <p><?= $member['name']; ?></p>
                        <span><?= $member['title'] ?></span>
                        <div class="contestant--cta">
                            <a class="jao-button" href="#" data-modal="team-mem-<?= $mem_count; ?>">About Me
                                <?php
                                get_template_part('svg/right-arrow-long', 'dark');
                                ?>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="team-mem-<?= $mem_count; ?>" class="team-modal team-featured image-text">
                    <div class="image">
                        <img alt="" src="<?= $member['image'] ?>">
                    </div>
                    <div class="text">
                        <span><?= $member['title'] ?></span>
                        <h3><?= $member['name']; ?></h3>
                        <p><?= $member['bio']; ?></p>
                    </div>
                </div>
                <?php
                $mem_count++;
            endforeach; ?>
        </div>
    </div>
</div>

