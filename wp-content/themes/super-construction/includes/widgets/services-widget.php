<?php

class Business_Point_Services_Widget extends WP_Widget {

    function __construct() {
        $opts = array(
            'classname' => 'business_point_widget_services',
            'description' => esc_html__('Display services.', 'super-construction'),
        );
        parent::__construct('super-construction-services', esc_html__('BP: Services', 'super-construction'), $opts);
    }

    function widget($args, $instance) {

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        $section_icon = !empty($instance['section_icon']) ? $instance['section_icon'] : '';

        $sub_title = !empty($instance['sub_title']) ? $instance['sub_title'] : '';

        $excerpt_length = !empty($instance['excerpt_length']) ? $instance['excerpt_length'] : 20;

        $read_more_text = !empty($instance['read_more_text']) ? $instance['read_more_text'] : '';

        $services_ids = array();

        $item_number = 9;

        for ($i = 1; $i <= $item_number; $i++) {
            if (!empty($instance["item_id_$i"]) && absint($instance["item_id_$i"]) > 0) {
                $id = absint($instance["item_id_$i"]);
                $services_ids[$id]['id'] = $id;
                $services_ids[$id]['icon'] = $instance["item_icon_$i"];
            }
        }

        echo $args['before_widget'];
        ?>

        <div class="services-list bp-services">

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
            if (!empty($services_ids)) {
                $query_args = array(
                    'posts_per_page' => count($services_ids),
                    'post__in' => wp_list_pluck($services_ids, 'id'),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'no_found_rows' => true,
                );
                $all_services = get_posts($query_args);
                ?>

                <?php if (!empty($all_services)) : ?>
                    <?php global $post; ?>

                    <div class="inner-wrapper">

                        <?php foreach ($all_services as $post) : ?>
                            <?php setup_postdata($post); ?>
                            <div class="services-item">
                                <div class="services-item-inner">

                                    <div class="service-icon">
                                        <i class="fa <?php echo esc_attr($services_ids[$post->ID]['icon']); ?>"></i>
                                    </div>

                                    <h4 class="services-item-title"><?php the_title(); ?></h4>

                                    <?php
                                    $content = business_point_get_the_excerpt(absint($excerpt_length), $post);

                                    echo $content ? wpautop(wp_kses_post($content)) : '';

                                    if (!empty($read_more_text)) {

                                        echo '<a href="' . esc_url(get_permalink()) . '" class="btn-continue">' . esc_html($read_more_text) . '</a>';
                                    }
                                    ?>

                                </div>
                            </div><!-- .services-item -->
                        <?php endforeach; ?>

                    </div><!-- .inner-wrapper -->

                    <?php wp_reset_postdata(); ?>

                <?php
                endif;
            }
            ?>

        </div><!-- .services-list -->

        <?php
        echo $args['after_widget'];
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field($new_instance['title']);

        $instance['section_icon'] = sanitize_text_field($new_instance['section_icon']);

        $instance['sub_title'] = sanitize_text_field($new_instance['sub_title']);

        $instance['excerpt_length'] = absint($new_instance['excerpt_length']);

        $instance['read_more_text'] = sanitize_text_field($new_instance['read_more_text']);

        $item_number = 9;

        for ($i = 1; $i <= $item_number; $i++) {
            $instance["item_id_$i"] = absint($new_instance["item_id_$i"]);
            $instance["item_icon_$i"] = sanitize_text_field($new_instance["item_icon_$i"]);
        }

        return $instance;
    }

    function form($instance) {

        // Defaults.
        $defaults = array(
            'title' => '',
            'section_icon' => 'fa-laptop',
            'sub_title' => '',
            'excerpt_length' => 20,
            'read_more_text' => esc_html__('Read More', 'super-construction'),
        );

        $item_number = 9;

        for ($i = 1; $i <= $item_number; $i++) {
            $defaults["item_id_$i"] = '';
            $defaults["item_icon_$i"] = 'fa-cog';
        }

        $instance = wp_parse_args((array) $instance, $defaults);
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
            <label for="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>">
        <?php esc_html_e('Excerpt Length:', 'super-construction'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('excerpt_length')); ?>" name="<?php echo esc_attr($this->get_field_name('excerpt_length')); ?>" type="number" value="<?php echo absint($instance['excerpt_length']); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>"><strong><?php esc_html_e('Read More Text:', 'super-construction'); ?></strong></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('read_more_text')); ?>" name="<?php echo esc_attr($this->get_field_name('read_more_text')); ?>" type="text" value="<?php echo esc_attr($instance['read_more_text']); ?>" />
            <small>
        <?php esc_html_e('Leave this field empty if you want to hide read more button in services section', 'super-construction'); ?>	
            </small>
        </p>

        <?php
        for ($i = 1; $i <= $item_number; $i++) {
            ?>
            <hr>
            <p>
                <label for="<?php echo $this->get_field_id("item_id_$i"); ?>"><strong><?php esc_html_e('Page:', 'super-construction'); ?>&nbsp;<?php echo $i; ?></strong></label>
                <?php
                wp_dropdown_pages(array(
                    'id' => $this->get_field_id("item_id_$i"),
                    'class' => 'widefat',
                    'name' => $this->get_field_name("item_id_$i"),
                    'selected' => $instance["item_id_$i"],
                    'show_option_none' => esc_html__('&mdash; Select &mdash;', 'super-construction'),
                        )
                );
                ?>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id("item_icon_$i")); ?>"><strong><?php esc_html_e('Icon:', 'super-construction'); ?>&nbsp;<?php echo $i; ?></strong></label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id("item_icon_$i")); ?>" name="<?php echo esc_attr($this->get_field_name("item_icon_$i")); ?>" type="text" value="<?php echo esc_attr($instance["item_icon_$i"]); ?>" />
            </p>
            <?php
        }
    }

}
