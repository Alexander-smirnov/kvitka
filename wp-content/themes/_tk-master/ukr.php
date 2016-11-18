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
                $i = 1;
                foreach ($slides as $slide) { ?>

                    <li class="item item-<?php echo $i; ?>">
                        <style>
                            .item-<?php echo $i; ?>:after {
                                content: "";
                                background-image: url('<?php echo $slide["image"] ?>');
                            }
                        </style>
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
    <section class="thanks-mom">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="content"><?php the_field('how_we_work_general_info_section'); ?></div>
                </div>
            </div>
        </div>
    </section>
    <section id="bouquet" class="bouquets-wrapper">
        <div class="container">
            <div class="row">
                <h2 class="col-sm-12 section-title"><?php the_field('bouquet_section_title'); ?></h2>

                <div class="flex-wrapper">
                    <?php
                    $button_text = get_field('button_label');
                    $args = array(
                        'post_type' => 'bouquets',
                        'post_per_page' => 9
                    );
                    $query = new WP_Query($args);
                    while ($query->have_posts())  : $query->the_post(); ?>
                        <div class="col-sm-6 col-md-4 bouquet">
                            <div class="about-bouquet">
                                <?php the_post_thumbnail('medium'); ?>
                                <h3 class="bouquet-title"
                                    data-desc='<?php echo get_the_content(); ?>'><?php the_title(); ?></h3>

                                <div class="about-wrapper">
                                    <span class="counter"><?php the_field('bouquet_qty', get_the_ID()); ?> штук</span>
                                    <span class="price"><?php the_field('bouquet_price', get_the_ID()); ?> грн</span>
                                    <span class="length"><?php the_field('Bouquet_Length', get_the_ID()); ?> см</span>
                                    <button class="send btn btn-default"><?php echo $button_text; ?></button>
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
    <section id="create" class="create-own-bouquet">
        <div class="container">
            <h2 class="section-title">
                <?php the_field('own_section_title'); ?>
            </h2>
            <button class="own-bouquet btn btn-default"><?php the_field('own_button_title'); ?></button>
        </div>
    </section>
    <section id="how-create" class="how-we-work">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('how_we_work_section_title'); ?>
                    </h2>

                    <div class="row">
                        <?php
                        $i = 1;
                        foreach (get_field('how_we_work_principles') as $principle) { ?>
                            <div class="col-sm-4 principle-wrapper">

                                <p class="principle-title"
                                   style="background: url(<?php echo $principle['principle_image']; ?>) no-repeat center 20%"><?php echo $i . '. ' . $principle['principle_title']; ?></p>

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
    <section class="how-to-order">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('how_to_to_order_title'); ?>
                    </h2>

                    <div class="row">
                        <?php
                        $i = 1;
                        foreach (get_field('how_to_order_principles') as $principle) { ?>
                            <div class="col-sm-4 principle-wrapper">

                                <p class="principle-title"
                                   style="background: url(<?php echo $principle['principle_image']; ?>) no-repeat center 20%"><?php echo $i . '. ' . $principle['principle_title']; ?></p>

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
    <section id="how-to-pay" class="how-to-pay">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('how_to_pay_section_title'); ?>
                    </h2>

                    <div class="partners-wrapper">
                        <?php
                        foreach (get_field('partners') as $partners) { ?>
                            <div class="partners">
                                <img src="<?php echo $partners['logo'] ?>" alt="partners">
                            </div>
                            <?php
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
    <section id="testimonials" class="testimonials-wrapper">
        <div class="container">
            <div class="row">
                <h2 class="section-title">
                    <?php the_field('testimonials_title'); ?>:
                </h2>

                <div class="testimonials-slider">
                    <ul class="testimonials-list slides">
                        <?php
                        $args = array(
                            'post_type' => 'testimonials',
                            'post_per_page' => -1
                        );
                        $query = new WP_Query($args);
                        while ($query->have_posts())  : $query->the_post(); ?>
                            <li class="testimonial">
                                <h4 class="testimonial-title"><?php the_title(); ?>:</h4>

                                <p class="testimonial-description"><?php echo get_the_content(); ?></p>
                            </li>

                        <?php endwhile;
                        wp_reset_query();
                        ?>

                    </ul>
                </div>
            </div>
        </div>

    </section>

    <section class="happy-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('happy_title'); ?>:
                    </h2>

                    <div class="happy-slider">
                        <ul class="happy-list slides">
                            <?php
                            $args = array(
                                'post_type' => 'happy',
                                'post_per_page' => -1
                            );
                            $query = new WP_Query($args);
                            while ($query->have_posts())  : $query->the_post(); ?>
                                <li class="happy">
                                    <?php the_post_thumbnail('happy'); ?>
                                </li>

                            <?php endwhile;
                            wp_reset_query();
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="for-sale">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('sale_title'); ?>
                    </h2>

                    <?php
                    $slogan = get_field('sale_slogan');
                    $d = get_field('day_label');
                    $h = get_field('hours_label');
                    $m = get_field('minutes_label');
                    $s = get_field('seconds_label');
                    $button = get_field('sale_button_title');
                    $args = array(
                        'post_type' => 'bouquets',
                        'post_per_page' => -1
                    );
                    $query = new WP_Query($args);
                    while ($query->have_posts())  : $query->the_post();
                        if (get_field('bouquet_on_sale')) {
                            if (get_field('bouquet_expired_date') > date("F d Y H:i:s T")) { ?>

                                <div class="row">
                                    <div class="col-md-8 thumb-wrapper">
                                        <div class="row">
                                            <div class="general-prize-wrapper">
                                                <div class="col-md-5 bouquet">
                                                    <div class="about-bouquet">
                                                        <?php the_post_thumbnail('medium'); ?>
                                                        <h3 class="bouquet-title"
                                                            data-desc='<?php echo get_the_content(); ?>'><?php the_title(); ?></h3>

                                                        <div class="about-wrapper">
                                                        <span
                                                            class="counter"><?php the_field('bouquet_qty', get_the_ID()); ?>
                                                            штук</span>
                                                        <span
                                                            class="price"><?php the_field('bouquet_price', get_the_ID()); ?>
                                                            грн</span>
                                                        <span
                                                            class="length"><?php the_field('Bouquet_Length', get_the_ID()); ?>
                                                            см</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-1 plus">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </div>
                                                <div class="col-md-5 prize-wrapper">
                                                    <div class="about-bouquet">
                                                        <img
                                                            src="<?php the_field('bouquet_addition_prize', get_the_ID()); ?>"
                                                            alt="prize">

                                                        <h3 class="bouquet-title"><?php the_field('prize_title', get_the_ID()); ?></h3>
                                                        <h4 class="prize-description"><?php the_field('prize_description', get_the_ID()); ?></h4>
                                                        <span
                                                            class="price"><?php the_field('prize_price', get_the_ID()); ?>
                                                            грн</span>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="action-wrapper">
                                            <h4 class="sale-slogan"
                                                data-end="<?php the_field('bouquet_expired_date') ?>"
                                                data-d="<?php echo $d ?>" data-h="<?php echo $h ?>"
                                                data-m="<?php echo $m ?>"
                                                data-s="<?php echo $s ?>"><?php echo $slogan; ?></h4>

                                            <div id="clockdiv"></div>
                                            <?php $text = get_field('action_text'); ?>
                                            <p class="actions-text"><?php echo $text; ?></p>

                                            <div class="price-wrapper">
                                                <?php
                                                $bouquet_price = intval(get_field('bouquet_price', get_the_ID()));
                                                $prize_price = intval(get_field('prize_price', get_the_ID()));
                                                $old_price = $bouquet_price + $prize_price;
                                                ?>
                                                <span class="old-price"><?php echo $old_price; ?> грн</span><span
                                                    class="new-price"><?php echo $bouquet_price; ?> грн</span>
                                            </div>
                                            <button class="actions-bouquet btn btn-default"><?php
                                                the_field('button_text', get_the_ID()); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {

                        }
                        ?>

                    <?php endwhile;
                    wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section id="contacts" class="contacts">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="section-title">
                        <?php the_field('contact_section_title'); ?>:
                    </h2>

                    <div class="single-contact-wrapper">

                        <?php
                        foreach (get_field('contacts') as $contact) {

                            switch ($contact["contact_type"]) {
                                case 'Phone number':
                                    $vowels = array('(', ')', ' ', '-');
                                    $formated_phone = str_replace($vowels, '', $contact["contact_number"]);
                                    $action = '<a class="phone" href="tel:' . $formated_phone . '" style="background-image:url(' . $contact["contact_ico"] . ');">' . $contact["contact_number"] . '</a>';
                                    break;
                                case 'Skype':
                                    $action = '<a class="skype" href="skype:' . $contact["contact_number"] . '?call" style="background-image:url(' . $contact["contact_ico"] . ');">' . $contact["contact_number"] . '</a>';
                                    break;
                                case 'Email':
                                    $action = '<a class="email" href="mailto:' . $contact["contact_number"] . '" style="background-image:url(' . $contact["contact_ico"] . ');">' . $contact["contact_number"] . '</a>';
                                    break;
                                case 'Viber':
                                    $vowels = array('(', ')', ' ', '-');
                                    $formated_phone = str_replace($vowels, '', $contact["contact_number"]);
                                    $action = '<a class="viber" href="viber://tel:' . $contact["contact_number"] . '" style="background-image:url(' . $contact["contact_ico"] . ');">' . $contact["contact_number"] . '</a>';
                                    break;
                            }
                            ?>
                            <div class="col-sm-5 contact">
                                <?php echo $action; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="feedback">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="custom-section-title">
                        <?php the_field('back_section_title'); ?>
                    </h2>

                    <h3 class="custom-section-subtitle">
                        <?php the_field('back_section_subtitle'); ?>
                    </h3>

                    <div class="form-wrapper">
                        <?php
                        $form_id = get_field('back_firm_id');
                        gravity_form($form_id, false, false, false, null, $ajax = true, $echo = true);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="order" class="modal fade order" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php the_field('cart_title'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="" alt="bouquet" class="order-image">
                        </div>
                        <div class="col-sm-6">
                            <h3 class="bouquet-title"></h3>

                            <p class="bouquet-description"></p>
                            <ul class="characteristics">
                                <li class="char row">
                                    <div class="col-xs-6">
                                        <span class="char-bold"><?php the_field('cartqty_title'); ?></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="qty"></span>
                                    </div>
                                </li>
                                <li class="char row">
                                    <div class="col-xs-6">
                                        <span class="char-bold"><?php the_field('cart_length_title'); ?></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="length"></span>
                                    </div>
                                </li>
                                <li class="char row">
                                    <div class="col-xs-6">
                                        <span class="char-bold"><?php the_field('cart_price_title'); ?></span>
                                    </div>
                                    <div class="col-xs-6">
                                        <span class="price"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="order-form-wrapper">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#home">Скорочена форма</a></li>
                                <li><a data-toggle="tab" href="#menu1">Повна форма</a></li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <?php
                                    $form_id = get_field('own_form');
                                    gravity_form(6, false, false, false, null, $ajax = true, $echo = true);
                                    ?>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <?php
                                    $form_id = get_field('cart_form_id');
                                    gravity_form($form_id, false, false, false, null, $ajax = true, $echo = true);
                                    ?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div id="create-own-bouquet" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><?php the_field('form_title'); ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="order-form-wrapper">
                            <?php
                            $form_id = get_field('own_form');
                            gravity_form($form_id, false, false, false, null, $ajax = true, $echo = true);
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php get_footer(); ?>