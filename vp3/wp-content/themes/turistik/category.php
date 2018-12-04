<?php
/**
 * A Simple Category Template
 */

get_header(); ?>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">Главная</h1>
                <div class="posts-list">
                    <section id="primary" class="site-content">
                        <div id="content" role="main">
                            <?php
                            // Check if there are any posts to display
                            if (have_posts()) : ?>
                                <header class="archive-header">
                                    <h1 class="archive-title">Категория: <?php single_cat_title('', true); ?></h1>
                                    <?php
                                    // Display optional category description
                                    if (category_description()) : ?>
                                        <div class="archive-meta"><?php echo category_description(); ?></div>
                                    <?php endif; ?>
                                </header>
                                <?php
// The Loop
                                while (have_posts()) : the_post(); ?>
                                    <h2><a href="<?php the_permalink() ?>" rel="bookmark"
                                           title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                                    </h2>
                                    <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
                                    <div class="entry">
                                        <?php the_content(); ?>
                                    </div>
                                <?php endwhile;
                            else: ?>
                                <p>Постов с указанной категорией не найдено</p>
                            <?php endif; ?>
                        </div>
                    </section>
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
    </div>

<?php //get_sidebar(); ?>
<?php get_footer(); ?>