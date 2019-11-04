<?php
/**
 * The template for displaying all single posts
 *
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Lokal_Revisorer
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
        <?php global $post; setup_postdata($post);  ?>

            <!-- Single Blog Hero Section -->
            <div class="single-blog-block hero-blur">
                <header class="entry-header">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="single-blog-props">
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
                                                <span><?php the_author(); ?></span>
                                                <span><?php echo get_avatar( $post->ID, 65 ); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    if ( is_singular() ) :
                                        the_title( '<h1 class="entry-title">', '</h1>' );
                                    else :
                                        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                                    endif;

                                    if ( 'post' === get_post_type() ) :
                                        ?>

                                        <?php $terms = get_the_terms( $post->ID, 'category' ); ?>
                                        <div class="cat-word-link">
                                            <span class="cat-word">Kategori:</span>
                                            <a href="#" class="btn btn-link"><?php echo $terms[0]->name; ?></a>
                                        </div>

                                        <div class="entry-meta">
                                            <?php
                                            /*lokalrev_posted_on();
                                            lokalrev_posted_by();*/
                                            ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div><!-- .jumbotron -->
                </header><!-- .entry-header -->
                <div class="entry-container-sidebar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                    <div class="entry-content">
                                        <?php
                                        the_field('summary');
                                        the_content( sprintf(
                                            wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                                __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lokalrev' ),
                                                array(
                                                    'span' => array(
                                                        'class' => array(),
                                                    ),
                                                )
                                            ),
                                            get_the_title()
                                        ) );

                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'lokalrev' ),
                                            'after'  => '</div>',
                                        ) );
                                        ?>
                                        <div class="share-info">
                                            <div class="share-txt">Del vores viden</div>
                                            <div class="share-icons">
                                                <a href="<?php the_field('facebook'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-facebook.png" alt="Icon Search">
                                                </a>
                                                <a href="<?php the_field('twitter'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-twitter.png" alt="Icon Search">
                                                </a>
                                                <a href="<?php the_field('linkedin'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-linkedin.png" alt="Icon Search">
                                                </a>
                                                <a href="<?php the_field('googleplus'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-googleplus.png" alt="Icon Search">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="author-info">
                                            <div class="author-img">
                                                <?php echo get_avatar( $post->ID, 108 ); ?>
                                            </div>
                                            <div class="author-credentials">
                                                <div class="auth-name"></div>
                                                <div class="aut-position"></div>
                                                <div class="auth-resume"></div>
                                            </div>
                                        </div>
                                    </div><!-- .entry-content -->

                                    <?php
                                    while ( have_posts() ) :
                                        the_post();

//                                    the_field('summary');
//                                    the_content();
//                                get_template_part( 'template-parts/content', get_post_type() );

//                                        the_post_navigation();

                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if ( comments_open() || get_comments_number() ) :
                                            comments_template();
                                        endif;

                                    endwhile; // End of the loop.
                                    ?>

                                    <footer class="entry-footer">
                                        <?php lokalrev_entry_footer(); ?>
                                    </footer><!-- .entry-footer -->
                                </article><!-- #post-<?php the_ID(); ?> -->

                            </div><!-- .col-lg-8 -->
                            <div class="single-blog-right-sidebar col-lg-4">
                                <?php if ( is_active_sidebar( 'sidebar-single-blog' ) ) : ?>
                                    <div id="true-foot" class="sidebar">
                                        <?php dynamic_sidebar( 'sidebar-single-blog' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php //get_sidebar(); ?>
                            </div>
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .entry-container-sidebar -->

            </div><!-- .single-blog-hero-block -->

            <?php //lokalrev_post_thumbnail(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
