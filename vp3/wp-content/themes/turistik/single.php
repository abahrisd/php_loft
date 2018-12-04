<?php
/**
 * Template Name: PageSingle
 */
get_header() ?>
    <div class="main-content">
        <div class="content-wrapper">

            <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 */
//                get_template_part( 'content', get_post_format() );

                // If comments are open or we have at least one comment, load up the comment template.
                /*if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;*/
                ?>

            <div class="content">
                <h1 class="title-page"><?php echo the_title(); ?></h1>
                <div class="posts-list">
                    <!-- post-mini-->
                    <div class="post-wrap">
                        <div class="post-thumbnail">
                            <img src="
                            <?php echo get_field('image')['sizes']['thumbnail']; ?>"
                                 alt="Image поста" class="post-thumbnail__image">
                        </div>
                        <div class="post-content">
                            <div class="post-content__post-text">
                                <p>
                                    <?php echo get_the_content(); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- post-mini_end-->
                </div>

                <div>
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation( array(
                        'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
                            '<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
                            '<span class="post-title">%title</span>',
                    ) );
                    // End the loop.
                    endwhile;
                    ?>
                </div>
            </div>

            <!-- sidebar-->
            <div class="sidebar">
                <div class="sidebar__sidebar-item">
                    <div class="sidebar-item__title">Теги</div>
                    <div class="sidebar-item__content">
                        <?php echo wp_tag_cloud();?>
                    </div>
                </div>
                <div class="sidebar__sidebar-item">
                    <?php echo ucc_get_calendar(array('promo', 'news'));?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>