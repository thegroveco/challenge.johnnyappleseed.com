<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package invitational
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4">
                    <?php dynamic_sidebar( 'footer-area-1' ); ?>
                </div>
                <div class="col-lg-9 offset-lg-1 offset-md-1 col-md-7">
                    <div class="footer-lists">
                        <div class="footer-area">
                            <?php dynamic_sidebar( 'footer-area-2' ); ?>
                            <?php dynamic_sidebar( 'footer-area-3' ); ?>
                            <?php dynamic_sidebar( 'footer-area-4' ); ?>
                            <?php dynamic_sidebar( 'footer-area-5' ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script async type="text/javascript" src="https://static.klaviyo.com/onsite/js/klaviyo.js?company_id=SJXYCv"></script>
</body>
</html>
