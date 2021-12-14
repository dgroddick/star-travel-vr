<?php get_header(); ?>

<div id="main-section" class="intro-text">
    <?php
    /**
     * Front page loop
     */
    if ( have_posts() ) {
        while ( have_posts() ) : the_post();
            the_title('<h1>', '</h1>');
            the_content();
        endwhile;
    }
    ?>
</div>

<?php
/**
 *  Loop for the planets
 */
$args = array( 'post_type' => 'planet', 'posts_per_page' => -1 );
$loop = new WP_Query( $args );
?>

<div class="row">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="column">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <section class="card">
                    <?php
                        if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'thumbnail' );
                        }
                        
                        the_title('<h1>', '</h1>');
                        echo '<div class="entry-content">';
                        the_content();
                        echo '</div>';
                    ?>
                </section>
            </a>
        </div>

    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>

<?php get_footer(); ?>

