<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package invitational
 */

$first_name = get_field("first_name") ?: "This Contestant";
?>
<div class="stage-header--wrapper has-crop-top"
     style="background: url(https://joa.336.thegrove.co/wp-content/uploads/2022/01/Meet-Contestants-Stage.jpg) center center/cover no-repeat;">
    <div class="stage-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-lg-5 offset-lg-1 order-lg-2">
                    <?php invitational_post_thumbnail(); ?>
                </div>
                <div class="col-lg-6">
                    <a href="/meet-the-contestants/" class="contestants-link">
                        <?php get_template_part("svg/down-arrow", "circle"); ?>
                        Meet more contestants
                    </a>
                    <h1><?= get_the_title(); ?></h1>
                    <p>from <?= get_field("location_origin"); ?></p>
                    <div class="social-media-links">
                        <?php foreach (get_field("social_media") as $social): ?>
                            <a aria-label="Visit <?= "{$first_name}'s {$social['social_media_platform']}"; ?>"
                               target="_blank"
                               href="<?= $social["platform_url"] ?>"><?php get_template_part('svg/icon', $social['social_media_platform']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <h3>About Me</h3>
                    <?php
                    the_content(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'invitational'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            wp_kses_post(get_the_title())
                        )
                    );
                    ?>

                    <h2>Intro Video</h2>
                    <div class="video-embed">
                        <?= wp_oembed_get(get_field("intro_video_url")); ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <h3><?= $first_name ?>'s Challenges</h3>
                    <div class="contestant-challenges">
                        <?php foreach (get_field("challenges") as $challenge_id): ?>
                            <a href="<?= get_the_permalink($challenge_id); ?>"
                               title="<?php get_the_title($challenge_id) ?>"><img
                                        src="<?= get_field("badge", $challenge_id); ?>"
                                        alt="<?php get_the_title($challenge_id) ?>"></a>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
                        
            <?php if ( $videos = get_field('weekly_videos') ) : ?>
                
                <div style="height:80px" aria-hidden="true" class="wp-block-spacer mobile-space"></div>
                
                <h2 class="mb-4">Weekly Videos</h2>
                
                <div class="row">
                    
                    <?php foreach( $videos as $video ) : ?>
                
                        <div class="col-xl-4 col-lg-6 mb-4">
                            <div class="weekly-video">
                                <div class="video-embed mb-3">
                                    <?= wp_oembed_get( $video["video_url"]); ?>
                                </div>
                                <h4 class="mb-1"><?= $video['video_title']; ?></h4>
                                <p class="mt-1"><?= $video['video_description']; ?></p>
                            </div>
                        </div>
                        
                    <?php endforeach; ?>
                    
                </div>
            
            <?php endif; ?>

        </div>

    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
