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
$id = 'contact-form-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-form';
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
<div id="<?php echo esc_attr($id); ?> " class="stage-header--wrapper"
     style="background: url(/wp-content/uploads/2022/02/contact-form.jpg) center center/cover no-repeat;" >

    <div class="stage-header <?php echo esc_attr($className); ?>">
        <div class="container">
            <div class="row">
               <div class="col-lg-7 text-left">
                   <div>
                       <h2>Get in touch.</h2>
                       <div class="klaviyo-form-R5h8q8"></div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>

