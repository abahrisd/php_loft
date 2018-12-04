<?php
/**
 * Template Name: SearchResults
 */
get_header() ?>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Результаты поиска</h1>
                <div class="posts-list">
                    <!-- post-mini-->
                    <?php

                    $params = [
                        'post_type' => array('promo', 'news'),
                        'order' => 'ASC',
                        's' => get_query_var('search')
                    ];

                    $the_query = new WP_Query($params);

                    if ($the_query->have_posts()) { while ($the_query->have_posts()) : $the_query->the_post();
                        ?>
                        <div class="post-wrap">
                            <div class="post-thumbnail">
                                <img src="<?php echo get_field('image')['sizes']['thumbnail']; ?>"
                                     alt="Image поста" class="post-thumbnail__image">
                            </div>
                            <div class="post-content">
                                <div class="post-content__post-text">
                                    <div class="post-title">
                                        <?php echo get_field('name'); ?>
                                    </div>
                                    <p>
                                        <?php echo get_the_content(); /*get_field('desc');*/ ?>
                                    </p>
                                    <?php $desc = get_field('desc');
                                    if (!empty($desc)) {
                                        echo '</p>'.$desc.'<p>';
                                    } ?>
                                </div>
                                <div class="post-content__post-control">
                                    <a href="<?php the_permalink() ?>" class="btn-read-post">Читать далее >></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile; } else {
                        echo 'По заданным параметрам результатов не найдено';
                    }
                    ?>
                    <!-- post-mini_end-->
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