<?php
get_header();
?>
<main>

    <section class="blog_pg_sec_1">
        <!-- top_heading_sec -->
        
            <div class="top_heading_sec">
                <div class="heading_sec_container flex_column">
                    <h1>
                       PROTECTOR TYPES
                    </h1>
                    <div class="list_items">
                        <div class="filter_section">
                            <div class="list_items">
                                <ul class="flex-breadcrumb">
                                    <nav class="breadcrumb_container flex_row">

                                        <li class="breadcrumb-item">
                                            <a class="tfc_breadcrumb" href="<?php echo home_url(); ?>">Home</a>
                                        </li>
                                        <div class="arow-image">
                                            <img class="w_auto" src="<?php echo get_template_directory_uri(); ?>/images/arrow.png" alt="">
                                        </div>
                                        <?php
                                        // Check if we're on a category archive page
                                        if (is_category()) {
                                          
                                            $current_category = get_queried_object();
                                     
                                            echo '<li class="breadcrumb-item"><span class="orange_text">' . esc_html($current_category->name) . '</span></li>';
                                        } else {
                                          
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                echo '<li class="breadcrumb-item"><a href="' . esc_url(get_category_link($categories[0]->term_id)) . '" class="orange_text">' . esc_html($categories[0]->name) . '</a></li>';
                                            }
                                        }
                                        ?>

                                    </nav>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category Title and Description -->
            <div class="blog_pg_sec_1_container global_product_review container_1200 flex_column">
            <div class="category_heading_section">
                <div class="category_heading_container flex_column">
                    <?php
                    if (is_category()) {
                        $current_category = get_queried_object();
                        echo '<h2>' . esc_html(single_cat_title('', false)) . '</h2>';
                        if (category_description()) {
                            echo '<p>' . category_description() . '</p>';
                        }
                    }
                    ?>
                </div>
            </div>


            <!-- bottom_col_2 start -->
            <div class="col_2">
                <div class="product_review_card_wrapper flex_row">
                    <?php
                    function display_posts_in_current_category()
                    {
                        if (is_category() || is_tag()) {
        $current_term = get_queried_object();
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
        );

        // Check if it's a category or a tag and set the appropriate argument
        if (is_category()) {
            $args['cat'] = $current_term->term_id; // Use the category ID
        } elseif (is_tag()) {
            $args['tag'] = $current_term->slug; // Use the tag slug
        }

                            $custom_query = new WP_Query($args);

                            if ($custom_query->have_posts()) :
                                while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                                    <div class="card_1 flex_column">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="prodct_img" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="image">
                                        </a>
                                        <div class="content_col flex_column">
                                            <div class="heading_txt flex_column">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </div>
                                            <div class="stars_nd_shares flex_row">
                                                <div class="lft_stars flex_row">
                                                    <a href=""><?php the_category(', '); ?></a>
                                                </div>
                                                <div class="ryt_shares flex_row">
                                                     <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                                                </div>
                                            </div>
                                            <p><?php echo wp_trim_words(get_the_content(), 25, '...'); ?></p>
                                        </div>
                                    </div>
                                    <div class="line"></div>
                    <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No posts found for this category</p>';
                            endif;
                        } else {
                            echo '<p>Please select a category to view posts</p>';
                        }
                    }

                    // Display posts only from the current category
                    display_posts_in_current_category();
                    ?>
                </div>
            </div>
            <!-- bottom_col_2 end -->
        </div>
    </section>



    <section class="global_stove_prot_bnfit">
      <div class="global_stove_prot_container container_1200 flex_row">
			<?php echo do_shortcode('[subscribe_section]'); ?>   
        </div>

    </section>


    <section class="global_product_review">
        <div class="global_prod_review_container container_1200 flex_column">
            <!-- global_heading_txt_overline -->
            <div class="global_heading_txt_overline flex_column">
                <div class="bg_lines flex_column">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <div class="line_heading">
					 <span><?php the_field('review__title', 'option'); ?></span>
                </div>
            </div>
            <!-- product_review_card_wrapper -->
              <?php echo do_shortcode('[wp-testimonials widget-id=1]')?>
            <!-- global red button -->
			<?php 
			// Get the ACF link field
			$read_all_reviews = get_field('read_all_reviews', 'option');

			if ($read_all_reviews) : 
				$button_url = $read_all_reviews['url'];
				$button_title = $read_all_reviews['title'];
				$button_target = $read_all_reviews['target'] ? $read_all_reviews['target'] : '_self';
				?>
				<a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>">
					<button class="red_btn global_btn"><?php echo esc_html($button_title); ?></button>
				</a>
			<?php endif; ?>
        </div>
    </section>



    <!-- FAQ  -->

    <?php echo do_shortcode('[faq_section]') ?>



    <section class="global_subscribe_update global_stove_prot_bnfit">
        <div class="global_stove_prot_container container_1200 flex_row">
            <div class="inner_wrapper flex_row">
                <?php echo do_shortcode('[footer_subscribe_section]'); ?> 
                <div class="ryt_col">
                    <!-- global red button -->
                     <?php echo do_shortcode('[newsletter_form]'); ?>

                </div>
            </div>
        </div>
    </section>






</main>


<?php
get_footer();
?>