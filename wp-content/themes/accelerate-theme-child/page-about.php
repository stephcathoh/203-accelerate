<?php

/**
 * This template is for displaying the custom About page
 *
 * It is based on the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * 
 *
 * @package WordPress
 * @subpackage Accelerate Marketing
 * @since Accelerate Marketing 2.0
 */

get_header(); ?>

<?php
$services_intro_heading = get_field('services_intro_heading');
$services_intro_text = get_field('services_intro_text');

?>

<section class="about-hero">

	<?php while (have_posts()) : the_post(); ?>


		<div class="hero-text">

			<h3 class="hero-title"> <?php the_field('hero_title'); ?></h3>
		</div>

		<?php

			$image = get_field('hero_image');

			if ($image) : ?>
			<style type="text/css">
				hero {
					background-image: url(<?php echo $image['url']; ?>);
				}
			</style>
		<?php endif; ?>
	<?php endwhile; // end of the loop. 
	?>
</section>


<div class="site-content">

	<section class="about-intro">
		<h4> <?php echo $services_intro_heading; ?></h4>
		<p> <?php echo $services_intro_text; ?></p>
	</section>
</div><!-- .site-content -->

<section class="service-offered">
	<div class="site-content">

		<?php query_posts('posts_per_page=4&post_type=services&orderby=post_date&order=ASC'); ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="service">
				<aside class="service-text">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</aside>

				<figure>
					<?php the_post_thumbnail('full'); ?></figure>

			</div>

</section>
<?php endwhile;
wp_reset_query(); ?>

<?php while (have_posts()) : the_post();
	$about_contact_cta = get_field('about_contact_cta');
	$contact_button = get_field('contact_button');
	?>

	<section class="about-contact">
		
		
		<div class="get-in-touch">
			<h4 class="about-cta"><?php echo $about_contact_cta; ?></h4>
			<a class="button CTA-button" href="<?php echo esc_url(home_url ('/'));?>contact-us"><?php echo $contact_button;?></a>
		</div>
		

	</section>

<?php endwhile;




get_footer(); ?>