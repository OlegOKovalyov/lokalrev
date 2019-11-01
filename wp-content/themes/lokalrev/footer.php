<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lokal_Revisorer
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="footer-widgets container">
            <div class="first-row row">
                <div class="col-12 col-sm-4 col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) : ?>
                        <div id="true-foot" class="sidebar">
                            <?php dynamic_sidebar( 'sidebar-footer-2' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-sm-4 col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) : ?>
                        <div id="true-foot" class="sidebar">
                            <?php dynamic_sidebar( 'sidebar-footer-3' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-12 col-sm-4 col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) : ?>
                        <div id="true-foot" class="sidebar">
                            <?php dynamic_sidebar( 'sidebar-footer-4' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-3">
                    <?php if ( is_active_sidebar( 'sidebar-footer-5' ) ) : ?>
                        <div id="true-foot" class="sidebar">
                            <?php dynamic_sidebar( 'sidebar-footer-5' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="second-row row">
                <div class="col">
                    <?php if ( is_active_sidebar( 'sidebar-footer-6' ) ) : ?>
                        <div id="true-foot" class="sidebar">
                            <?php dynamic_sidebar( 'sidebar-footer-6' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <hr>
            <div class="site-info">
                <div class="row">
                    <div class="col">
                        <?php if ( is_active_sidebar( 'sidebar-footer-7' ) ) : ?>
                            <div id="true-foot" class="sidebar">
                                <?php dynamic_sidebar( 'sidebar-footer-7' ); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div><!-- .site-info -->
        </div><!-- .container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
