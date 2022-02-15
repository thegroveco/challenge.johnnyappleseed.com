<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package invitational
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'invitational'); ?></a>
    <div class="modal-wrapper" role="dialog">
        <div class="modal" role="alert">
            <div class="content"></div>
        </div>
    </div>
    <?php if ($site_headline = get_field("latest_news", "option")): ?>
        <div class="site-headline">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <p>
                            <strong>Latest News:</strong>
                            <a href="<?= $site_headline['url'] ?>"><?= $site_headline['title']; ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>
    <header id="masthead" class="site-header">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav id="site-navigation" class="main-navigation">
                        <button class="menu-toggle" aria-controls="primary-menu"
                                aria-expanded="false">
                            <span></span>
                            <span></span>
                            <span></span>
                            <div class="screen-reader-text">
                                <?php esc_html_e('Primary Menu', 'invitational'); ?>
                            </div>
                        </button>
                        </span>
                        <ul id="primary-menu" class="menu nav-menu">
                            <li id="site-brand"><a href="/"><img class="no-lazyload"
                                                                 src="<?= wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full')[0] ?>"
                                                                 alt=""></a></li>
                            <?php
                            wp_nav_menu(
                                array(
                                    'items_wrap' => '%3$s',
                                    'container' => false,
                                    'theme_location' => 'menu-1',
                                    'menu_id' => 'primary-menu',
                                )
                            );
                            ?>
                        </ul>

                    </nav><!-- #site-navigation -->
                </div>
            </div>
        </div>
    </header><!-- #masthead -->
