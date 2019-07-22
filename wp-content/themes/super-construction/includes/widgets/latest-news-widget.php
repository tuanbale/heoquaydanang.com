<?php

class Business_Point_Latest_News_Widget extends WP_Widget {

    function __construct() {
        $opts = array(
            'classname' => 'business_point_widget_latest_news',
            'description' => esc_html__('Latest News Widget', 'super-construction'),
        );

        parent::__construct('super-construction-latest-news', esc_html__('BP: Latest News', 'super-construction'), $opts);
    }

    function widget($args, $instance) {

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        $section_icon = !empty($instance['section_icon']) ? $instance['section_icon'] : '';

        $sub_title = !empty($instance['sub_title']) ? $instance['sub_title'] : '';

        $post_category = !empty($instance['post_category']) ? $instance['post_category'] : 0;

        $exclude_categories = !empty($instance['exclude_categories']) ? esc_attr($instance['exclude_categories']) : '';

        $disable_date = !empty($instance['disable_date']) ? $instance['disable_date'] : 0;

        echo $args['before_widget'];
        ?>

        <div class="latest-news-widget bp-latest-news">

            <div class="section-title">

                <?php
                if ($title) {
                    echo $args['before_title'] . esc_html($title) . $args['after_title'];
                }

                if ($section_icon) {
                    ?>

                    <div class="seperator">
                        <span><i class="fa <?php echo esc_html($section_icon); ?>"></i></span>
                    </div>
                    <?php
                }

                if ($sub_title) {
                    ?>

                    <p><?php echo esc_html($sub_title); ?></p>

                <?php }
                ?>

            </div>

            <?php
            $query_args = array(
                'posts_per_page' => 3,
                'no_found_rows' => true,
                'post__not_in' => get_option('sticky_posts'),
                'ignore_sticky_posts' => true,
            );

            if (absint($post_category) > 0) {

                $query_args['cat'] = absint($post_category);
            }

            if (!empty($exclude_categories)) {

                $exclude_ids = explode(',', $exclude_categories);

                $query_args['category__not_in'] = $exclude_ids;
            }

            $all_posts = new WP_Query($query_args);

            if ($all_posts->have_posts()) :
                ?>

                <div class="inner-wrapper">

                    <?php
                    while ($all_posts->have_posts()) :

                        $all_posts->the_post();
                        ?>

                        <div class="small-items-wrap">

                            <div class="latest-news-item">
                                <div class="latest-news-wrapper">

                                    <?php if (has_post_thumbnail()) : ?>
                                        <div class="latest-news-thumb">
                                            <?php the_post_thumbnail('super-construction-blog'); ?>
                                            <a href="<?php the_permalink(); ?>" class="news-hover-link"><i class="fa fa-link" aria-hidden="true"></i></a>
                                        </div><!-- .latest-news-thumb -->
                                    <?php endif; ?>
                                    <div class="latest-news-text-wrap">
                                        <h4 class="latest-news-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4><!-- .latest-news-title -->
                                        <?php if (1 != $disable_date) { ?>
                                            <span class="latest-news-date"><?php echo esc_html(get_the_date()); ?></span>
                                        <?php } ?>

                                    </div><!-- .latest-news-text-wrap -->

                                </div>
                            </div>

                        </div>

                        <?php
                    endwhile;

                    wp_reset_postdata();
                    ?>

                </div>

            <?php endif; ?>

        </div><!-- .latest-news-widget -->

        <?php
        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['section_icon'] = sanitize_text_field($new_instance['section_icon']);
        $instance['sub_title'] = sanitize_text_field($new_instance['sub_title']);
        $instance['post_category'] = absint($new_instance['post_category']);
        $instance['exclude_categories'] = sanitize_text_field($new_instance['exclude_categories']);
        $instance['disable_date'] = (bool) $new_instance['disable_date'] ? 1 : 0;

        return $instance;
    }

    function form($instance) {

        $instance = wp_parse_args((array) $instance, array(
            'title' => '',
            'section_icon' => 'fa-folder-open-o',
            'sub_title' => '',
            'post_category' => '',
            'exclude_categories' => '',
            'disable_date' => 0,
        ));
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><strong><?php esc_html_e('Title:', 'super-construction'); ?></strong></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('section_icon')); ?>"><strong><?php esc_html_e('Icon:', 'super-construction'); ?></strong></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('section_icon')); ?>" name="<?php echo esc_attr($this->get_field_name('section_icon')); ?>" type="text" value="<?php echo esc_attr($instance['section_icon']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('sub_title')); ?>"><strong><?php esc_html_e('Sub Title:', 'super-construction'); ?></strong></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('sub_title')); ?>" name="<?php echo esc_attr($this->get_field_name('sub_title')); ?>" type="text" value="<?php echo esc_attr($instance['sub_title']); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('post_category')); ?>"><strong><?php esc_html_e('Select Category:', 'super-construction'); ?></strong></label>
            <?php
            $cat_args = array(
                'orderby' => 'name',
                'hide_empty' => 0,
                'class' => 'widefat',
                'taxonomy' => 'category',
                'name' => $this->get_field_name('post_category'),
                'id' => $this->get_field_id('post_category'),
                'selected' => absint($instance['post_category']),
                'show_option_all' => esc_html__('All Categories', 'super-construction'),
            );
            wp_dropdown_categories($cat_args);
            ?>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('exclude_categories')); ?>"><strong><?php esc_html_e('Exclude Categories:', 'super-construction'); ?></strong></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('exclude_categories')); ?>" name="<?php echo esc_attr($this->get_field_name('exclude_categories')); ?>" type="text" value="<?php echo esc_attr($instance['exclude_categories']); ?>" />
            <small>
                <?php esc_html_e('Enter category id seperated with comma. Posts from these categories will be excluded from latest post listing.', 'super-construction'); ?>	
            </small>
        </p>
        <p>
            <input class="checkbox" type="checkbox" <?php checked($instance['disable_date']); ?> id="<?php echo $this->get_field_id('disable_date'); ?>" name="<?php echo $this->get_field_name('disable_date'); ?>" />
            <label for="<?php echo $this->get_field_id('disable_date'); ?>"><?php esc_html_e('Hide Posted Date', 'super-construction'); ?></label>
        </p>
        <?php
    }

}
