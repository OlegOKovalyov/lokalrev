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
            <div class="blog-hero-block hero-blur">
                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">

                                <?php
                                while ( have_posts() ) :
                                    the_post();

                                    get_template_part( 'template-parts/content', 'page' );

                                    ?>

                                    <?php

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;

                                endwhile; // End of the loop.
                                ?>

                            </div>
                            <div class="blog-search offset-lg-2 col-lg-4 col-md-6 col-sm-6">
                                <div class="input-group">
                                    <form action="<?php bloginfo( 'url' ); ?>" method="get">
                                        <input class="form-control border-secondary" type="search" name="s" placeholder="Søgeord" value="<?php if(!empty($_GET['s'])){echo $_GET['s'];}?>"/>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit">
                                                <img src="<?php echo get_template_directory_uri(); ?>/images/i-search.png" alt="Icon Search">
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- .row -->

                        <?php
                        global $post; // не обязательно
                        $cats_posts = get_posts( array(
                            'category_name' => '',
                            'exclude' => 1,
                            'post_type' => 'post',
                        ) ); ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cats-btns" data-toggle="buttons">
                                    <?php
                                    $cat_slugs = get_terms( array(
                                        'taxonomy'    => 'category',
                                        'orderby'     => 'term_id',
                                    )   );
                                    $chkbxout = '';
                                    foreach ( $cat_slugs as $cat_slug) {
                                        if ( $cat_slug->term_id != 1 ) {
                                            $chkbxout .= '<label class="btn btn-primary">';
                                            $chkbxout .= '<input type="checkbox" name="selection[]" value="';
                                            $chkbxout .= $cat_slug->term_id;
                                            $chkbxout .= '" class="checkbox-select">';
                                            $chkbxout .= '<span>' . $cat_slug->name . '</span>';
                                            $chkbxout .= '<img src="';
                                            $chkbxout .= get_template_directory_uri() . '/images/i-eye.png';
                                            $chkbxout .= '" alt="Eye Icon"></label>';
                                        }
                                    }
                                   echo $chkbxout;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .blog-hero-block -->

            <!-- Card Block Section -->
            <div class="card-block">
                <div class="container">
                    <div class="row">
                    <?php
                    foreach( $cats_posts as $post ){
                        setup_postdata( $post ); ?>

                        <div class="card-wrap col-lg-4 col-md-6 col-sm-12">
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
                                        <div class="entry-author-avatar">
                                            <span><?php echo get_the_author(); ?></span>
                                            <span><?php echo get_avatar( $post->ID, 65 ); ?></span>
                                        </div>
                                    </div>
                                    <div class="card-title">
                                        <h5><?php echo $post->post_title; ?></h5>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="<?php echo get_permalink($post->ID) ?>">
                                        <?php the_post_thumbnail( array(368,208) ); ?>
                                    </a>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <?php $terms = get_the_terms( $post->ID, 'category' ); ?>
                                    <div class="cat-word-link">
                                        <span class="cat-word">Kategori:</span>
                                        <a href="#" class="btn btn-link"><?php echo $terms[0]->name; ?></a>
                                    </div>
                                </div>
                            </div><!-- .card -->
                        </div>
                        <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div><!-- .row -->
                </div>
            </div><!-- .card-block -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
