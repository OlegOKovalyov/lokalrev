<?php
/**
 * Template Name: Blog page template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lokal_Revisorer
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

            <!-- Blog Hero Section -->
            <div class="blog-hero-block">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">


                                <?php
                                while ( have_posts() ) :
                                    the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                                    ?>
                                    <h1><?php //the_title();?></h1>
                                    <?php

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
                                ?>

<!--                                <h1>--><?php //echo $hero['hero_h1']; ?><!--</h1>-->
                            </div>
                            <div class="blog-search offset-lg-6 col-lg-3">
                                <div class="input-group">
                                    <div class="input-group">
                                        <input class="form-control border-secondary py-2" type="search" value="Søgeord">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/i-search.png" alt="Icon Search">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .row -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cats-btns">
                                    <a href="#" class="btn btn-primary btn-lg"><?php echo $hero['hero_button_text']; ?></a>
                                    <a href="#" class="btn btn-primary btn-lg"><?php echo $hero['hero_button_text']; ?></a>
                                    <a href="#" class="btn btn-primary btn-lg"><?php echo $hero['hero_button_text']; ?></a>
                                    <a href="#" class="btn btn-primary btn-lg"><?php echo $hero['hero_button_text']; ?></a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>


<?php
global $post; // не обязательно

// 5 записей из рубрики 9
$cats_posts = get_posts( array(
    'category_name' => 'Bilag',
    'post_type' => 'post'
) );

foreach( $cats_posts as $post ){
    setup_postdata( $post );
    $user_ID = get_current_user_id(); ?>
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
    <p><?php the_date(); ?></p>
    <p><?php the_author(); ?></p>
    <p><?php echo get_avatar( $user_ID, 65 ); ?></p>
    <?php
    // стандартный вывод записей
}

wp_reset_postdata(); // сбрасываем переменную $post
?>




		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
