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
                            <div class="col-lg-6">

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

                            </div>
                            <div class="blog-search offset-lg-2 col-lg-4">
                                <div class="input-group">
                                    <div class="input-group">
                                        <input class="form-control border-secondary" type="search" value="" placeholder="Søgeord">
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
                                    <?php
                                    $cat_slugs = get_terms( 'category' );
                                    $output = '';
                                    foreach ( $cat_slugs as $cat_slug) {
                                        if ( $cat_slug->term_id != 1 ) {
                                            $output .= '<a href="#" class="btn btn-primary">';
                                            $output .= '<span>' . $cat_slug->name . '</span>';
                                            $output .= '<img src="';
                                            $output .= get_template_directory_uri() . '/images/i-eye.png';
                                            $output .= '" alt="Eye Icon">';
                                            $output .= '</a>';
                                        }
                                    }
                                    echo $output;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .blog-hero-block -->

            <!-- Card Block Section -->
            <?php
            global $post; // не обязательно
            $cats_posts = get_posts( array(
                'category_name' => '',
                'exclude' => 1,
                'post_type' => 'post',
            ) ); ?>

            <div class="card-block">
                <div class="container">
                    <div class="row">
                    <?php
                    foreach( $cats_posts as $post ){
                        setup_postdata( $post ); ?>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-props">
                                        <div class="entry-date">
                                            <div class="entry-date-day">
                                                <?php echo get_the_date( 'j', $post->ID ); ?>
                                            </div>
                                            <div class="entry-date-month">
                                                <?php echo get_the_date( 'M', $post->ID ); ?>.
                                            </div>
                                        </div>
<!--                                        <div class="entry-date">--><?php //echo get_the_date( 'j', $post->ID ); ?><!--</div>-->
<!--                                        <div class="entry-date">--><?php //echo get_the_date( 'M', $post->ID ); ?><!--</div>-->
                                        <!--                <span class="entry-date">--><?php //echo $post->post_date; ?><!--</span>-->
                                        <!--                <span>--><?php //the_author(); ?><!--</span>-->
                                        <div class="entry-atuhor-avatar">
                                            <span><?php echo get_the_author(); ?></span>
                                            <span><?php echo get_avatar( $post->ID, 65 ); ?></span>
                                        </div>
                                    </div>
                                    <div class="card-title">
                                        <h5><?php echo $post->post_title; ?></h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php  //wp_get_attachment_url( $post->ID ); ?>
                                    <?php //echo wp_get_attachment_image( $post->ID, array(20,20), true); ?>
                                    <?php the_post_thumbnail( medium, array(358,200) ); ?>
                                    <?php //echo get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
                                    // вернет
                                    // http://wp-kama.ru/wp-content/uploads/2016/03/post-meta-fields4-80x80.png ?>
                                    <!--            <img src="--><?php //echo get_the_post_thumbnail_url( $post->ID, 'thumbnail' ); ?><!--" class="card-img-top" alt="...">-->
                                    <p class="card-text"><?php echo $post->post_excerpt; ?></p>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <?php
                                    $terms = get_the_terms( $post->ID, 'category' );
                                    /*if( $terms ){
                                        $term = array_shift( $terms );

                                        // теперь можно можно вывести название термина
                                        echo $term->name;
                                    }*/
        //                                    print_r($terms);
                                    ?>
        <!--                                    <span>Kategori: </span><a href="#" class="btn btn-primary"><?php //echo get_the_terms( $post->ID, 'category' ); ?></a>-->
                                    <span>Kategori: </span><a href="#" class="btn btn-link"><?php echo $terms[0]->name; ?></a>
                                    <?php //print_r(get_the_terms( $post->ID, 'category' )); ?>
                                </div>
                            </div>
                        </div>

                        <?php
                        // стандартный вывод записей
                    }

                    wp_reset_postdata(); // сбрасываем переменную $post
                    ?>
                    </div><!-- .row -->
                </div>
            </div>

            <?php
            echo '<pre>';
            var_dump($cats_posts);
            var_dump($cat_slugs);
            echo '</pre>';
            ?>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
