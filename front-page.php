<?php get_header(); ?>
<main class='slideshow_container' id='slideshow_container'>
	<header class='slideshow_header'>
		<h1>Carmen Rinio and Ryan Quirk</h1>
		<?php 
			$date = strtotime("November 12, 2016 2:00 PM");
			$remaining = $date - time();
			$days_remaining = floor($remaining / 86400);
		?>
		<h2>November 12th, 2016 <small><?php echo $days_remaining.' Days Remaining'; ?></small></h2>
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
  </main>
  <section id='rsvp' class='rsvp'>
    <h2>Save The Date</h2>
    <hr />
    <form class='wrapper' action='' method='post'>
      <label class='half' for='ceremony'>
        <input type='checkbox' name='ceremony' value='1' />
        I will attend the ceremony
      </label>
      <label class='half' for='reception'>
        <input type='checkbox' name='reception' value='1' />
        I will attend the reception
      </label>
      <label for='name'>
        <input type='text' name='name' value='' />
        Name
      </label>
      <label for='phone_number'>
        <input type='tel' name='phone_number' value='' />
        Phone Number
      </label>
      <label for='address'>
        <input type='text' name='address' value='' />
        Address
      </label>
      <label for='plus_one'>
        <input type='checkbox' name='plus_one' value='1' />
        Plus One
      </label>
      <label for='name'>
        <input type='text' name='name' value='' />
        Name
      </label>
      <label for='comments'>Other Comments: (food allergies, small children, etc)</label>
      <textarea name='comments' resize></textarea>
    </form>
  </section>
<?php get_footer(); ?>
