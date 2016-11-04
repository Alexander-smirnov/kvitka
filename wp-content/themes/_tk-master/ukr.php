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

                foreach ( $slides as $slide ) { ?>

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
            foreach ( get_field('how_we_work_principles') as $principle ) { ?>
                    <div class="col-sm-4">
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

<?php get_footer(); ?>