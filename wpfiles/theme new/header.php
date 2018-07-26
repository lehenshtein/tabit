<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Graphy
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="note-popup--wrapper">
    <div class="note-popup">
        <h3>Edit note</h3>
        <div class="close close-img"><img src="/wp-content/themes/graphy/img/close.png" alt="" class="close-img"></div>
        <div class="note-popup__row1">
            <p class="note-popup__title">
                Note length
            </p>
            <div class="note-length__wrapper">
                <div class="note-length-btn note-length-btn__16">16</div>
                <div class="note-length-btn note-length-btn__8">8</div>
                <div class="note-length-btn note-length-btn__4">4</div>
                <div class="note-length-btn note-length-btn__2">2</div>
                <div class="note-length-btn note-length-btn__1">1</div>
                <div class="note-length-btn note-length-btn__X">X</div>
            </div>
        </div>
        <div class="note-popup__row2">
            <p class="note-popup__title">
                Fret
            </p>
            <div class="input-box">
                <input class="slider note-slider" value="0" min="0" max="25" name="rangeslider" type="range" />
            </div>
            <div class="values">
                <span>0</span><span>25</span>
            </div>
        </div>
        <div class="note-popup__row3">
            <p class="note-popup__title">
                Technique
            </p>
            <div class="note-technique__wrapper">
                <div class="note-technique__ico note-technique__ico1"><img src="/wp-content/themes/graphy/img/hammer.png" title="hammer/pull" alt="hm"></div>
                <div class="note-technique__ico note-technique__ico2"><img src="/wp-content/themes/graphy/img/slide.png" title="slide" alt="slide"></div>
                <div class="note-technique__ico note-technique__ico3"><img src="/wp-content/themes/graphy/img/vibrato.png" title="vibrato" alt="vibrato"></div>
                <div class="note-technique__ico note-technique__ico4"><img src="/wp-content/themes/graphy/img/half-vibrato.png" title="half vibrato" alt="half-vibrato"></div>
                <div class="note-technique__ico note-technique__ico5"><img src="/wp-content/themes/graphy/img/bend.png" title="bend" alt="bend"></div>
                <div class="note-technique__ico note-technique__ico6"><img src="/wp-content/themes/graphy/img/half-bend.png" title="half-bend" alt="half-bend"></div>
                <div class="note-technique__ico note-technique__ico7"><img src="/wp-content/themes/graphy/img/bend-from-top.png" title="top bend" alt="top-bend"></div>
                <div class="note-technique__ico note-technique__ico8"><img src="/wp-content/themes/graphy/img/half-bend-from-top.png" title="half top bend" alt="half-top-bend"></div>
                <div class="note-technique__ico note-technique__ico9"><img src="/wp-content/themes/graphy/img/hammer.png" alt=""></div>
                <div class="note-technique__ico note-technique__ico10"><img src="/wp-content/themes/graphy/img/hammer.png" alt=""></div>

            </div>
        </div>
    </div>
</div>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'graphy' ); ?></a>

	<header id="masthead" class="site-header">

		<div class="site-branding">
		<?php graphy_logo(); ?>
		<?php graphy_site_title(); ?>
		<?php if ( ! get_theme_mod( 'graphy_hide_blogdescription' ) ) : ?>
			<div class="site-description"><?php bloginfo( 'description' ); ?></div>
		<?php endif; ?>
		<?php if ( has_nav_menu( 'header-social' ) ) : ?>
			<nav id="header-social-link" class="header-social-link social-link">
				<?php wp_nav_menu( array( 'theme_location' => 'header-social', 'depth' => 1, 'link_before'  => '<span class="screen-reader-text">', 'link_after'  => '</span>' ) ); ?>
			</nav><!-- #header-social-link -->
		<?php endif; ?>
		</div><!-- .site-branding -->

		<?php if ( ! get_theme_mod( 'graphy_hide_navigation' ) ) : ?>
		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle"><span class="menu-text"><?php esc_html_e( 'Menu', 'graphy' ); ?></span></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php if ( ! get_theme_mod( 'graphy_hide_search' ) ) : ?>
			<?php get_search_form(); ?>
			<?php endif; ?>
		</nav><!-- #site-navigation -->
		<?php endif; ?>

		<?php if ( is_page() && has_post_thumbnail() ) : ?>
		<div id="header-image" class="header-image">
			<?php the_post_thumbnail( 'graphy-page-thumbnail' ); ?>
		</div><!-- #header-image -->
		<?php elseif ( ( get_header_image() && 'site' == get_theme_mod( 'graphy_header_display' ) ) ||
		               ( get_header_image() && 'page' == get_theme_mod( 'graphy_header_display' ) && is_page() ) ||
		               ( get_header_image() && 'page' != get_theme_mod( 'graphy_header_display' ) && is_home() ) ) : ?>
		<div id="header-image" class="header-image">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</div><!-- #header-image -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	
		<?php if (function_exists('user_submitted_posts')) user_submitted_posts(); ?>
