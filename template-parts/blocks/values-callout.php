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
$id = 'our-values-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'our-values';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

//@TODO Padding variances via ACF?
$title = get_field("title") ?: "Our Values";
$default_text = "<h3>Title Goes Here</h3><p>Enter some text here for this column!</p>";
$content = array();

for ($i = 1; $i <= 3; $i++):
    $content[] = get_field("text_" . $i) ?: $default_text;
endfor;


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $title; ?></h2>
            </div>
        </div>
        <div class="row">
            <?php foreach ($content as $text): ?>
                <div class="col-lg-4">
                    <?= $text; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

