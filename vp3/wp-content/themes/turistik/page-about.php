<?php
/**
 * Template Name: PageAbout
 */
get_header() ?>
    <div class="main-content">
        <div class="content-wrapper">
            <div class="content">
                <h1 class="title-page">О сервисе</h1>
                <p><img src="http://placehold.it/380x300" alt="Image" class="alignleft">Например, рейсы с пересадками
                    стоят дешевле, чем прямые рейсы. Однако, в отдельных случаях пересадка может длиться не час-два, а
                    все 11 часов или даже сутки. То есть, вам придется дополнительный день провести в промежуточном
                    аэропорту, а это очень вымотает. Следите, чтобы пересадка была не слишком короткой, но и не очень
                    длинной, оптимально 2-3 часа.</p>
                <p>Например, рейсы с пересадками стоят дешевле, чем прямые рейсы. Однако, в отдельных случаях пересадка
                    может длиться не час-два, а все 11 часов или даже сутки. То есть, вам придется дополнительный день
                    провести в промежуточном аэропорту, а это очень вымотает. Следите, чтобы пересадка была не слишком
                    короткой, но и не очень длинной, оптимально 2-3 часа.</p>
                <img src="http://placehold.it/380x300" alt="Image" class="alignright">
                <ol>
                    <li>
                        При заполнении формы бронирования/покупки внимательно
                        вписывайте все свои данные. После того, как все заполните, перепроверьте:
                        все номера личных документов до цифр, имя, фамилию - до букв, чтобы
                        все было указано точь-в-точь, как в вашем загранпаспорте.
                    </li>
                    <li>
                        Далее вам на e-mail придет "Подтверждение бронирования".
                        Это еще не подтверждение покупки, а просто сведения о бронировании!
                    </li>
                    <li>
                        Вторым электронным документом, пришедшим вам на e-mail,
                        будет "Информация о платеже" - она говорит о том, что деньги сняты
                        с вашей карты и переведены в авиакомпанию.
                    </li>
                </ol>
                <div class="page-navigation">
                    <div class="page-navigation-wrap"><a href="#" class="page-navigation__prev-page"><i
                                    class="icon icon-angle-double-left"></i>Предыдущая статья</a></div>
                    <div class="page-navigation-wrap"><a href="#" class="page-navigation__next-page">Сдедующая статья<i
                                    class="icon icon-angle-double-right"></i></a></div>
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