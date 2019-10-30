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
            <div class="hero-block jumbotron jumbotron-fluid" style="background: url(<?php echo esc_url($hero['hero_image']); ?>) no-repeat center top; background-size: cover;">
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
                        <div class="col-xl-5 col-lg-5 col-md-12">
                            <div class="blockquote-row row">
                                <blockquote class="blockquote">
                                    <?php the_field('quote_text'); ?>
                                    <div class="blockquote-footer"><?php the_field('quote_author'); ?></div>
                                </blockquote>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12">
                            <div class="row">
                                <?php echo do_shortcode('[contact-form-7 id="54" title="Form On Mainpage"]'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Red Block Section -->
            <?php $red_section = get_field('red_section'); ?>
            <?php if( $red_section ): ?>
            <div class="red-block">
                <div class="container">
<!--                    <div class="row">-->
                        <div class="col-lg-10">
                            <h2><?php echo $red_section['title']; ?></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-icon">
                                <img class="i-image" src="<?php echo $red_section['icon1'] ?>" alt="">
                                <h4><?php echo $red_section['title_1'] ?></h4>
                                <p><?php echo $red_section['text_1'] ?></p>
                            </div>
                            <div class="col-md-4 col-icon">
                                <img class="i-image" src="<?php echo $red_section['icon2'] ?>" alt="">
                                <h4><?php echo $red_section['title_2'] ?></h4>
                                <p><?php echo $red_section['text_2'] ?></p>
                            </div>
                            <div class="col-md-4 col-icon">
                                <img class="i-image" src="<?php echo $red_section['icon3'] ?>" alt="">
                                <h4><?php echo $red_section['title_3'] ?></h4>
                                <p><?php echo $red_section['text_3'] ?></p>
                            </div>
                        </div>
<!--                    </div>-->
                </div>
            </div>
            <?php endif; ?>

            <!-- Slider Section -->
            <div class="slider-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <h3 class="h3-title"><?php the_field('subtitle_after_red_block'); ?></h3>
                            <?php the_field('text_after_red_block'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12">
                            <?php echo do_shortcode('[slide-anything id=\'88\']') ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pink Block Section -->
            <?php $pink_section = get_field('pink_section'); ?>
            <?php if( $pink_section ): ?>
            <div class="pink-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <h2><?php echo $pink_section['title']; ?></h2>
                            <p class="text1"><?php echo $pink_section['text1']; ?></p>
                        </div>
                        <div class="offset-lg-1 col-lg-6 col-md-12">
                            <div class="list-wrap">
                                <p class="circles"><?php echo $pink_section['list1']; ?></p>
                                <p class="circles"><?php echo $pink_section['list2']; ?></p>
                                <p class="circles"><?php echo $pink_section['list3']; ?></p>
                                <p class="circles"><?php echo $pink_section['list4']; ?></p>
                                <p class="circles last-p"><?php echo $pink_section['list5']; ?></p>
                                <p class="text2"><?php echo $pink_section['text2']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>


		<?php
		while ( have_posts() ) :
			the_post();

			//get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
