<?php
/**
 * Template Name: Main page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lokal_Revisorer
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <!-- Hero Section -->
            <?php $hero = get_field('hero_section'); ?>
            <?php if( $hero ): ?>
            <div class="jumbotron jumbotron-fluid" style="background: url(<?php echo esc_url($hero['hero_image']); ?>) no-repeat center top; background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1><?php echo $hero['hero_h1']; ?></h1>
                            <?php echo $hero['hero_text']; ?>
                            <div class="hero-btn">
                                <a href="#" class="btn btn-primary btn-lg"><?php echo $hero['hero_button_text']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <!-- Quote and Form Section -->
            <div class="quote-and-form">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <blockquote class="blockquote">
                                <?php the_field('quote_text'); ?>
                                <div class="blockquote-footer"><?php the_field('quote_author'); ?></div>
                            </blockquote>
                        </div>
                        <div class="col-lg-7">
                            <?php echo do_shortcode('[contact-form-7 id="54" title="Form On Mainpage"]'); ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
