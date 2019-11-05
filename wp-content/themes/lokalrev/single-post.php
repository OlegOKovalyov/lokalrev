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
                                                <span>Af <?php the_author(); ?></span>
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
                                        <div class="summary-text"><?php the_field('summary_text'); ?></div>
                                        <div class="summary-signature"><?php the_field('summary_signature'); ?></div>
                                        <?php
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
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-facebook.png" alt="Icon Facebook">
                                                </a>
                                                <a href="<?php the_field('twitter'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-twitter.png" alt="Icon Twitter">
                                                </a>
                                                <a href="<?php the_field('linkedin'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-linkedin.png" alt="Icon LinkedIn">
                                                </a>
                                                <a href="<?php the_field('googleplus'); ?>">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/images/i-googleplus.png" alt="Icon Googl+">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="author-info">
                                            <div class="author-img">
                                                <?php echo get_avatar( $post->ID, 108 ); ?>
                                            </div>
                                            <div class="author-credentials">
                                                <div class="auth-name"><?php echo get_the_author_meta('display_name'); ?></div>
                                                <div class="auth-position"><?php the_field('position_and_company'); ?></div>
                                                <div class="auth-description"><?php echo get_the_author_meta('description'); ?></div>
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
                                        <?php //lokalrev_entry_footer(); ?>
                                    </footer><!-- .entry-footer -->
                                </article><!-- #post-<?php the_ID(); ?> -->

                            </div><!-- .col-lg-8 -->
                            <div class="single-blog-right-sidebar col-lg-4">
                                <div id="sidebar" class="sidebar">

                                <?php //$orig_post = $post;
                                //global $post;
                                $categories = get_the_category($post->ID);
                                if ($categories) {
                                    $category_ids = array();
                                    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

                                    $args=array(
                                        'category__in'    => $category_ids,
                                        'post__not_in'    => array($post->ID),
                                        'posts_per_page'  => 3, // Number of related posts that will be shown.
                                        'caller_get_posts'=> 1
                                    );

                                    $related_posts_query = new wp_query( $args );
                                    if( $related_posts_query->have_posts() ) {
                                        echo '<div id="related_posts"><h3>Relateret artikler</h3><ul>';
                                        while( $related_posts_query->have_posts() ) {
                                            $related_posts_query->the_post();?>

                                            <li><div class="relatedthumb"><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
                                                <div class="relatedcontent">
                                                    <h4><a href="<? the_permalink()?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                                                    <?php //the_time('M j, Y') ?>
                                                </div>
                                            </li>
                                            <?
                                        }
                                        echo '</ul></div>';
                                    }
                                }
                                $post = $orig_post;
                                wp_reset_query(); ?>

                                <?php //get_sidebar(); ?>
                                </div><!-- .sidebar -->
                            </div><!-- .single-blog-right-sidebar -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .entry-container-sidebar -->

            </div><!-- .single-blog-hero-block -->

            <?php //lokalrev_post_thumbnail(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
