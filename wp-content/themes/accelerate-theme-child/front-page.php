<?php
/**
 * The template for displaying the homepage
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Accelerate Marketing Child
 * @since Accelerate Marketing 2.0
 */

get_header(); ?>

<div id="primary" class="home-page hero-content">
		<div class="main-content" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
				<a class="button" href="<?php echo site_url('/case-studies/') ?>">View Our Work</a>
            <?php endwhile; // end of the loop. ?>
            </div><!-- .main-content -->
	</div><!-- #primary -->
	
    <section class="featured-work">
        <div class="site-content">


        <ul class="homepage-featured-work">
        <h4>Featured Work</h4>

        <?php query_posts('posts_per_page=3&post_type=case_studies&orderby=post_date&order=ASC'); ?>
        <?php while ( have_posts() ) : the_post(); 
            $image_1= get_field('image_1');
            $size='medium';
        
        ?>
            <li>
            <figure>
           <?php echo wp_get_attachment_image($image_1, $size); ?>
            
                </figure>
           
        <h3><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
        <?php the_excerpt(); ?> 
        <?php endwhile; ?>
        </li> 
</ul>
        <?php wp_reset_query(); ?>

            
        </div>

        </section>
    
    <section class="recent-posts">
        <div class="site-content">
        <div class="blog-post">
        <h4> From the blog </h4>
        <?php query_posts('posts_per_page=1'); ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?> 
        <?php endwhile; ?> 
        <?php wp_reset_query(); ?>

        </div>
            
        </div>
    </section>

<?php get_footer(); ?>
