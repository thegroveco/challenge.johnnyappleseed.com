<?php
add_action('acf/init', 'joa_block_types');
function joa_block_types()
{

    if (function_exists('acf_register_block_type')) {

        // Header Stage Block
        acf_register_block_type(array(
            'name' => 'stage-header',
            'title' => __('Stage'),
            'description' => __('Main stage area for image and text. Typically at the top of the page.'),
            'render_template' => 'template-parts/blocks/stage-header.php',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('stage', 'header', 'featured', 'image', 'arrow', 'top')
        ));

        acf_register_block_type(array(
            'name' => 'section-description',
            'title' => __('Section Description'),
            'description' => __('Large Title and Description Text - typically after Stage Header'),
            'render_template' => 'template-parts/blocks/section-description.php',
            'category' => 'formatting',
            'icon' => 'format-aside',
            'keywords' => array('section', 'description', 'title', 'heading', 'arrow')
        ));

        acf_register_block_type(array(
            'name' => 'contestants-list',
            'title' => __('Contestants List'),
            'description' => __('List of Contestants'),
            'render_template' => 'template-parts/blocks/list-contestants.php',
            'category' => 'formatting',
            'icon' => 'groups',
            'keywords' => array('contestant', 'contestants', 'list', 'cards', 'people')
        ));

        acf_register_block_type(array(
            'name' => 'separator',
            'title' => __('Separator'),
            'description' => __('Separator Green Line for Spacing'),
            'render_template' => 'template-parts/blocks/separator.php',
            'category' => 'formatting',
            'icon' => 'minus',
            'keywords' => array('separator', 'spacing', 'space','divider')
        ));

        acf_register_block_type(array(
            'name' => 'challenge-summary',
            'title' => __('Challenge Summary'),
            'description' => __('Singular section for explaining the challenges with a visual representation in a grid.'),
            'render_template' => 'template-parts/blocks/challenge-summary.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('challenges', 'description', 'summary', 'vegetables','grid')
        ));

        acf_register_block_type(array(
            'name' => 'challenge-list',
            'title' => __('Challenge List'),
            'description' => __('Ordered List of Challenges'),
            'render_template' => 'template-parts/blocks/challenge-list.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('challenges', 'list', 'summary', 'vegetables','grid')
        ));

        acf_register_block_type(array(
            'name' => 'text-image-row',
            'title' => __('Text & Image Row'),
            'description' => __('Row consisting of a column for an image, as well as a column'),
            'render_template' => 'template-parts/blocks/text-image.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('text', 'image', 'row')
        ));

        acf_register_block_type(array(
            'name' => 'banner',
            'title' => __('Banner'),
            'description' => __('Callout Banner - Used for advertising the competition.'),
            'render_template' => 'template-parts/blocks/banner.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('banner','cta','strip')
        ));

        acf_register_block_type(array(
            'name' => 'featured-team',
            'title' => __('Featured Team Member'),
            'description' => __('A Text-Image Row specialized for featured Team Member Bio and Picture'),
            'render_template' => 'template-parts/blocks/team-featured.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('team', 'member', 'featured')
        ));

        acf_register_block_type(array(
            'name' => 'team-grid-list',
            'title' => __('Team Grid List'),
            'description' => __('Grid List of Team Members with Modal for Bio Description.'),
            'render_template' => 'template-parts/blocks/list-team.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('team', 'grid', 'modal')
        ));

        acf_register_block_type(array(
            'name' => 'prizes',
            'title' => __('Prize List'),
            'description' => __('Prize List for homepage.'),
            'render_template' => 'template-parts/blocks/list-prizes.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('prizes', 'awards', 'winnings')
        ));

        acf_register_block_type(array(
            'name' => 'sponsor-callout',
            'title' => __('Sponsor Callouts'),
            'description' => __('Homepage section for descriptions on two sponsors.'),
            'render_template' => 'template-parts/blocks/sponsor-callout.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('sponsor', 'description', 'tet')
        ));

        acf_register_block_type(array(
            'name' => 'full-width-bg-text',
            'title' => __('Full-width Text with Color BG'),
            'description' => __('Full-width Text with a colored background for accent rows.'),
            'render_template' => 'template-parts/blocks/text-full-width.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('full', 'width', 'text')
        ));

        acf_register_block_type(array(
            'name' => 'our-values-callout',
            'title' => __('"Our Values" Callout'),
            'description' => __('Our Values - Callout Text for About Page'),
            'render_template' => 'template-parts/blocks/values-callout.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('full', 'width', 'text')
        ));



        acf_register_block_type(array(
            'name' => 'appleseed-callout',
            'title' => __('Appleseed Callout'),
            'description' => __('Multi-column text with background for Johnny Appleseed Info Callout'),
            'render_template' => 'template-parts/blocks/appleseed-callout.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('full', 'width', 'text')
        ));

        acf_register_block_type(array(
            'name' => 'contact-form',
            'title' => __('Contact Form'),
            'description' => __('Get In Touch - Contact Form - with Background Image and Title'),
            'render_template' => 'template-parts/blocks/contact-form.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('full', 'width', 'text')
        ));

        acf_register_block_type(array(
            'name' => 'social-media-links',
            'title' => __('Social Media Links'),
            'description' => __('Link List of Social Media'),
            'render_template' => 'template-parts/blocks/social-links.php',
            'category' => 'formatting',
            'icon' => 'align-pull-left',
            'keywords' => array('social', 'links', 'twitter')
        ));

    }
}


function blocks_editor_scripts()
{
    $editor_style_path = '/editor-style.css';

    wp_enqueue_style(
        'block-editor-styles',
        get_stylesheet_directory_uri() . $editor_style_path,
        ['wp-edit-blocks'],
        filemtime(get_template_directory() . $editor_style_path)
    );
}

add_action('enqueue_block_editor_assets', 'blocks_editor_scripts');
