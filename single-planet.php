<?php 
/**
 * Template for Planet single pages
 */

get_header(); 
?>
<div id='planet'></div>
    <?php
        $template_dir = get_template_directory_uri();

        while ( have_posts() ) : the_post();
            $texture = "";

            if (class_exists('MultiPostThumbnails')) {                              
                if (MultiPostThumbnails::has_post_thumbnail('planet', 'feature-image-2')) {
                    $texture = MultiPostThumbnails::get_post_thumbnail_url('planet', 'feature-image-2'); 
                }                       
            }
            ?>
            <a-scene>
                <a-assets>
                    <img id="<?php the_title(); ?>Texture" src="<?php echo $texture; ?>">
                </a-assets>

                <a-mixin id="rotation" 
                        animation="property: rotation; 
                                    loop: true; 
                                    from:  0 0 0;
                                    to: 0 360 0;
                                    dur: 30000; 
                                    easing: linear;">
                </a-mixin>
            
                <a-sphere id="<?php the_title(); ?>" position="0 2 -10" radius="1.5" mixin="rotation" src="#<?php the_title(); ?>Texture"></a-sphere>
                
                <a-sky color="#000"></a-sky>
                <a-entity star-system="count: 1000; radius: 250; depth: 0"></a-entity>

            </a-scene>
            <?php
  
        endwhile;

    ?>

<?php get_footer(); ?>