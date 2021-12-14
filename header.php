<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="container">

            <header id="masthead" class="header">
                <?php $blog_info = get_bloginfo( 'name' ); ?>

                <?php if ( ! empty( $blog_info ) ) : ?>

                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>

                <?php endif; ?>

                <div class="parallax"></div>
                
            </header>

            <main class="main">