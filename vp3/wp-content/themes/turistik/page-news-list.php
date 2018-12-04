<?php
/**
 * Template Name: PageNewsList
 */
get_header() ?>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Список новостей</h1>
                <div class="posts-list">
                    <!-- post-mini-->
                    <?php
                    $the_query = new WP_Query(array(
                        'post_type'=> 'news',
                        'order'    => 'ASC'
                    ));

                    if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post();
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
                                </div>
                                <div class="post-content__post-control">
                                    <a href="<?php the_permalink() ?>" class="btn-read-post">Читать далее >></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    endif;
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
                    <!--                    <div class="sidebar-item__title">Категории</div>-->
                    <div class="sidebar-item__content">
                        <?php echo wp_list_categories();?>
                    </div>
                </div>
                <div class="sidebar__sidebar-item">
                    <?php echo ucc_get_calendar(array('promo', 'news'));?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer() ?>