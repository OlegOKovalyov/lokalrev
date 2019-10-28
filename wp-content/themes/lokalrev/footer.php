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

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->

<script>
    $('.custom_checkbox').prop('indeterminate', false)
</script>

</body>
</html>
