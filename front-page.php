<?php get_header(); ?>
<main class='slideshow_container' id='slideshow_container'>
	<header class='slideshow_header'>
		<h1>Carmen Rinio and Ryan Quirk</h1>
    </header>
    <section role='main' id='slideshow' class='slideshow'>
    <?php 
        $args = array(
            'post_type' => 'slide',
            'posts_per_page' => -1,
            'nopaging' => true,
            'order' => 'rand'
        );
        $slide_query = new WP_Query($args);
        while($slide_query->have_posts()) : $slide_query->the_post(); 
        $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
    ?>
        <article class='slide' data-in="opacity: 0; duration: 1500" data-out="opacity: 0; duration: 1500">
			<img src='<?php echo $url;?>' alt='Slideshow Image' />
        </article>
    <?php endwhile; ?>
    </section>
    <footer class='slideshow_footer'>
        <?php 
			$date = strtotime("November 12, 2016 2:00 PM");
			$remaining = $date - time();
			$days_remaining = floor($remaining / 86400);
		?>
		<h2>November 12th, 2016 <small><?php echo $days_remaining.' Days Remaining'; ?></small></h2>
    </footer>
    <article class='home_content'>
    <?php 
        $home_page_args = array(
            'category_name' => 'home',
            'order' => 'ASC'
        ); 
        $home = new WP_Query($home_page_args);
    ?>
    <?php while($home->have_posts()) : $home->the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <hr />
        <?php the_content(); ?>
    <?php endwhile; ?>
    </article>
    <section id='rsvp' class='rsvp'>
        <h2>Save The Date</h2>
        <hr />
        <?php gravity_form(1, false, false); ?>
    </section>
</main>
<?php get_footer(); ?>
