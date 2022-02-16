<?php

/**
 * List of Prizes
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'prize-list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'prize-list';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}


$prizes = get_field("prizes");

//@TODO Cache Bitcoin value for the day.
$bitcoin_price = json_decode(wp_remote_retrieve_body(wp_remote_get("https://api.coinbase.com/v2/prices/spot?currency=USD")))->data->amount;
echo '<div class="d-none">';
print_r(wp_remote_retrieve_body(wp_remote_get("https://api.coinbase.com/v2/prices/spot?currency=USD")));
echo '</div>';
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="prizes">
                    <?php foreach ($prizes as $prize): ?>
                        <div class="prize">
                            <img src="<?= $prize['image'] ?>" alt="">
                            <h3><?= $prize['name']; ?></h3>

                            <?php if (strpos($prize['name'], 'Bitcoin') > 0): ?>
                                <div class="bitprice">
                                    <span>Current Value:</span>
                                    <p>$<?= number_format($bitcoin_price, 2, '.', ','); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</div>

