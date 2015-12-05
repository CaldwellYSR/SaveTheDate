<?php get_header(); ?>
    <section role='main' id='slideshow' class='slideshow'>
    <?php 
        $args = array(
            'post_type' => 'slide',
            'posts_per_page' => -1,
            'nopaging' => true,
            'order' => 'ASC'
        );
        $slide_query = new WP_Query($args);
        while($slide_query->have_posts()) : $slide_query->the_post(); 
        $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
    ?>
        <article class='slide' style='background: url(<?php echo $url;?>) no-repeat center center / cover' data-in="opacity: 0; duration: 1500" data-out="opacity: 0; duration: 1500">
        </article>
    <?php endwhile; ?>
    </section>
    <h1>Carmen Rinio and Ryan Quirk</h1>
<?php get_footer(); ?>
