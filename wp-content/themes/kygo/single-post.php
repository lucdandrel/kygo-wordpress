<?php get_header();
    if (have_posts()):
        while (have_posts()) : the_post(); ?>

        <section class="single-new">

            <div class="single-new__intro">
                <h2><?php the_title(); ?></h2>
                <p><?php the_field('description') ?></p>
                <div class="date"><?= strftime("%d %b. %Y",strtotime(get_post()->post_date)); ?></div>
            </div>

            <div class="single-new__img">
                <img src="<?= get_the_post_thumbnail_url(); ?>" alt="">
            </div>

            <div class="single-new__content">
                <?php the_content(); ?>
            </div>

            <div class="single-new__share">
                <span>Share this article on :<i class="fa fa-facebook" aria-hidden="true"></i><i class="fa fa-twitter" aria-hidden="true"></i></span>
            </div>

        </section>

        <section class="similar-articles">

            <h2 class="simliar-articles__title">Similar articles</h2>

            <?php

            $category = get_the_category();

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order'   => 'DESC',
                'category_name' => $category
            );

            $query = new WP_Query($args);

            if ($query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post(); ?>

                    <li class="new__cards">
                        <div class="card" data-src="<?php the_permalink(); ?>">
                            <div class="new__img" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>)"></div>
                            <div class="new__content">
                                <div class="new__date date"><?= strftime("%d %b. %Y",strtotime(get_post()->post_date)); ?></div>
                                <h3 class="new__title"><?php the_title(); ?></h3>
                                <p class="new__description"><?php the_field('description') ?></p>
                                <a class="new__more btn-kygo" href="<?php the_permalink(); ?>">Read more</a>
                            </div>
                        </div>
                    </li>

                    <?php
                endwhile;
            endif; ?>
        </section>


<?php   endwhile;
    endif; ?>



<?php get_footer(); ?>