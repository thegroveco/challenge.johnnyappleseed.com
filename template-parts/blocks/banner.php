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
$id = 'banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

//@TODO Padding variances via ACF?

$content = get_field("content") ?: "<h2>Six Organic Gardners. Six Growing Challenges.<strong>One Goal.</strong></h2>";
$cta = get_field("cta_button");

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <?= $content; ?>
                <?php if ($cta): ?>
                    <a href="<?= $cta['url'] ?>" target="<?= ($cta['target'] ?: '_self') ?>"><?= $cta['title'] ?>
                        <svg id="Group_5205" data-name="Group 5205" xmlns="http://www.w3.org/2000/svg" width="16"
                             height="16" viewBox="0 0 16 16">
                            <g id="Group_4949" data-name="Group 4949" transform="translate(5.279 5.111)">
                                <path id="Path_1192" data-name="Path 1192" d="M5.983,2.991,2.991,0,0,2.991"
                                      transform="translate(5.796 0) rotate(90)" fill="none" stroke="#fff"
                                      stroke-miterlimit="10" stroke-width="1.25"/>
                                <line id="Line_958" data-name="Line 958" x1="5.609" transform="translate(0 2.991)"
                                      fill="none" stroke="#fff" stroke-width="1.25"/>
                            </g>
                            <g id="Ellipse_34" data-name="Ellipse 34" fill="none" stroke="#fff" stroke-width="1.25">
                                <circle cx="8" cy="8" r="8" stroke="none"/>
                                <circle cx="8" cy="8" r="7.375" fill="none"/>
                            </g>
                        </svg>
                    </a>
                <?php endif ?>

            </div>
        </div>
    </div>
</div>

