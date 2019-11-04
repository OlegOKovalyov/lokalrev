<!-- Card Block Section -->
<?php  global $post; ?>
    <div class="container">
        <div class="row">
            <?php
            foreach( $posts as $post ){
                setup_postdata( $post ); ?>

                <div class="card-wrap col-lg-4">
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
                    </div>
                </div>

                <?php
                }

                wp_reset_postdata();
                ?>
        </div><!-- .row -->
    </div>
