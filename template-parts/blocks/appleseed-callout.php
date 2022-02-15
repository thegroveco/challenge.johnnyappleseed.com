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
$id = 'appleseed-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'appleseed';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


//Fields
$background_image = get_field("background_image");

$challenges = new WP_Query([
    'post_type' => 'challenge',
    'posts_per_page' => 6,
]);

$cta = get_field("cta_button");

?>
<div id="<?php echo esc_attr($id); ?> " class="stage-header--wrapper has-crop-top"
     style="<?= $background_image ? "background: url({$background_image}) center center/cover no-repeat;" : "background: #333"; ?>">

    <div class="<?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h2>Johnny Appleseed <br>Authentic Apple Trees</h2>
                    <h3>We’re stewards of the last known surviving tree planted <br>by the real Johnny Appleseed.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5">
                    <p>Everyone knows the legend of Johnny Appleseed, the adventuring frontiersman who traveled early America and left hundreds of apple trees in his wake. Like most tall tales, this one contains a nugget of truth: over 100 years ago, a pioneer named John Chapman actually did venture through the frontier planting apple trees. </p>
                    <p>Decades later, the last surviving tree he planted was saved and propagated by our founder, Jeff Meyer. Today, it lives on as the Johnny Appleseed Authentic Algeo Apple Tree — a bud-grafted, genetically identical copy of the proven heirloom tree, which was likely planted in the early 1830s.</p>
                    <p>The legacy tree came to our attention in 1996, after decades of stewardship on the Harvey-Algeo centennial farm in Ashland County, Ohio.</p>
                </div>
                <div class="col-lg-5">
                    <p>Family legend holds that Chapman visited their early American ancestors on a number of occasions, breaking bread with Dick Algeo’s grandparents before retiring to sleep in a barn that still stands on the property today.</p>
                        <p>In addition to stewarding this piece of American history, we honor Chapman’s pioneering legacy with our revolutionary Climate Farming™ model, which empowers small farmers and gardeners to produce delicious, nutritious fruits and vegetables while joining in the fight against climate change.</p>
                    <?php if ($cta): ?>
                        <a href="<?= $cta['url'] ?>" class="jao-button"
                           target="<?= ($cta['target'] ?: '_self') ?>"><?= $cta['title'] ?><?php get_template_part('svg/right-arrow-long', 'dark'); ?></a>
                    <?php endif ?>                </div>
            </div>
        </div>
    </div>
</div>

