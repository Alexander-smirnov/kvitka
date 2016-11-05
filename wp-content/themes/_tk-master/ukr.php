<?php
/**
 * Template Name: Українська версія
 */
get_header();
?>
    <section class="slider-wrapper">
        <div class="flexslider">
            <ul class="slides">
                <?php
                $slides = get_field('slider');

                foreach ($slides as $slide) { ?>

                    <li class="item" style="background-image: url('<?php echo $slide["image"] ?>');">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="titles-wrapper">
                                        <h2 class="top-title"><?php echo $slide["top_title"] ?></h2>

                                        <h3 class="bottom-title"><?php echo $slide["bottom_title"] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php
                    $i++;
                } ?>
            </ul>
        </div>
    </section>
    <section class="how-we-work">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="content"><?php the_field('how_we_work_general_info'); ?></div>
                    <h2 class="section-title">
                        <?php the_field('how_we_work_section_title'); ?>
                    </h2>

                    <div class="row">
                        <?php
                        $i = 1;
                        foreach (get_field('how_we_work_principles') as $principle) { ?>
                            <div class="col-sm-4 principle-wrapper">
                                <p class="counter"><?php echo $i; ?></p>

                                <p class="principle-title"><?php echo $principle['principle_title']; ?></p>

                                <p class="principle-description"><?php echo $principle['principle_description']; ?></p>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bouquets-wrapper">
        <div class="container">
            <div class="row">
                <h2 class="col-sm-12 section-title"><?php the_field('bouquet_section_title'); ?></h2>

                <div class="flex-wrapper">
                    <?php
                    $args = array(
                        'post_type' => 'bouquets',
                        'post_per_page' => 9
                    );
                    $query = new WP_Query($args);
                    $filter_counter = 0;
                    while ($query->have_posts())  : $query->the_post(); ?>
                        <div class="col-sm-6 col-md-4 bouquet">
                            <div class="about-bouquet">
                                <?php the_post_thumbnail('medium'); ?>
                                <h3 class="bouquet-title"><?php the_title(); ?></h3>

                                <div class="about-wrapper">
                                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                                    <span class="counter"><?php the_field('bouquet_qty', get_the_ID()); ?> шт.</span>
                                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                                    <span class="price"><?php the_field('bouquet_price', get_the_ID()); ?> грн.</span>
                                    <i class="fa fa-asterisk" aria-hidden="true"></i>
                                    <span class="length"><?php the_field('Bouquet_Length', get_the_ID()); ?> см.</span>
                                    <button class="send btn btn-default">Відправити мамі</button>
                                </div>

                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="create-own-bouquet">
        <div class="container">
            <h2 class="section-title">
                Не знайшли потрібноно букету? Створіть власний!
            </h2>
            <button class="own-bouquet btn btn-default">Створити власний букет</button>
        </div>
    </section>
    <section class="how-to-order">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="section-title">
                        <?php the_field('how_to_to_order_title'); ?>
                    </h2>

                    <div class="row">
                        <?php
                        $i = 1;
                        foreach (get_field('how_to_order_principles') as $principle) { ?>
                            <div class="col-sm-4 principle-wrapper">
                                <p class="counter"><?php echo $i; ?></p>

                                <p class="principle-title"><?php echo $principle['principle_title']; ?></p>

                                <p class="principle-description"><?php echo $principle['principle_description']; ?></p>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-to-pay">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('how_to_pay_section_title'); ?>
                    </h2>

                    <div class="partners-wrapper">
                        <?php
                        $i = 1;
                        foreach (get_field('partners') as $partners) { ?>
                            <div class="col-md-4 col-sm-6 partners">
                                <img src="<?php echo $partners['logo'] ?>" alt="partners">

                                <p class="partners-title"><?php echo $partners['partners_title'] ?></p>
                            </div>
                            <?php
                            $i++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="how-to-return">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('how_to_return_section_title'); ?>
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <section class="how-to-return">
        </section>

<?php get_footer(); ?>