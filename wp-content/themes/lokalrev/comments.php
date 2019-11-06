<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lokal_Revisorer
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<div class="comments-title"> <img src="<?php echo get_template_directory_uri(); ?>/images/i-comment.png" alt="Icon Comment">
			<?php
			$lokalrev_comment_count = get_comments_number();
			if ( '1' === $lokalrev_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'lokalrev' ),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s kommentarer ', '%1$s kommentarer ', $lokalrev_comment_count, 'lokalrev' ) ),
					number_format_i18n( $lokalrev_comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</div><!-- .comments-title -->

        <div class="write-your-comment-wrap">
            <div class="write-your-comment">
                <div class="call-to-comment">Skriv en kommentar ...</div>
                <div class="instructions">
                    <div class="instruction-txt">Du skal være logget ind for at skrive en kommentar</div>
                    <a class="instruction-login-link" href="#">Log ind</a>
                </div>
            </div>
        </div>

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments( array(
			        'type' => 'comment',
                    'style'      => 'div',
                    'short_ping' => true,
                    'max_depth'  => 1,
                    'avatar_size' => 55,
                    'callback'    => 'lokalrev_comment',
			) );
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php //esc_html_e( 'Comments are closed.', 'lokalrev' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div><!-- #comments -->
