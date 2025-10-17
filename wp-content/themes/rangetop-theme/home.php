<?php
/*Template Name: Home page */
get_header();
?>
<main>
    <!-- index_sec_1 -->
    <section class="index_sec_1">
        <div class="index_sec_1_container global_product_review container_1200 flex_column">
            <!-- upper_col_1 start -->
            <div class="col_1 flex_row">
                <div class="product_review_card_wrapper flex_row">
                    <!-- card_1,2,3 -->
                    <?php
                    echo posts();
                    ?>
                </div>
            </div>
            <hr>
            <div class="col_2">
                <div class="product_review_card_wrapper flex_row">
                    <!-- card_1 ,2, 3 ,4-->
                    <?php echo posts_by_category(); ?>
                    <div class="line"></div>
                </div>
            </div>
            <!-- bottom_col_2 end -->
        </div>
    </section>


    <!-- global_stove_protector start -->
    <section class="global_stove_prot_bnfit">
        <div class="global_stove_prot_container container_1200 flex_row">
			<?php echo do_shortcode('[subscribe_section]'); ?>   
        </div>
    </section>


    <!-- index_pg_sec_3 -->
    <section class="index_sec_3">
        <div class="index_sec_3_container container_1200 flex_column">
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
                    <span>
                        <?php
                        $featured_categories  = get_field('featured_categories');
                        if ($featured_categories) {
                            echo  $featured_categories;
                        } else {
                            echo 'not founded';
                        }
                        ?>
                    </span>
                </div>
            </div>
            <!-- inner_categories_wrapper -->
            <?php echo get_dynamic_category_section(); ?>
        </div>
    </section>


    <!-- global_latest_posts -->
    <section class="global_latest_posts">
        <div class="global_latst_post_container container_1200 flex_column">
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
                    <span>
                        <?php
                        $latest_post  = get_field('latest_post');
                        if ($latest_post) {
                            echo  $latest_post;
                        } else {
                            echo 'not founded';
                        }
                        ?>
                    </span>
                </div>
            </div>
            <!-- grid_col_posts latest posts-->
            <?php echo latest_posts(); ?>
            <!-- global red button -->
			<?php 
			// Get the ACF link field
			$See_all_blogs = get_field('see_all_blogs');

			if ($See_all_blogs) : 
				$button_url = $See_all_blogs['url'];
				$button_title = $See_all_blogs['title'];
				$button_target = $See_all_blogs['target'] ? $See_all_blogs['target'] : '_self';
				?>
				<a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>">
					<button class="red_btn global_btn"><?php echo esc_html($button_title); ?></button>
				</a>
			<?php endif; ?>
        </div>
    </section>


    <!-- global_product_review -->
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
                  <?php echo do_shortcode('[wp-testimonials widget-id=1]')?>


            <!-- product_review_card_wrapper -->
            <div class="product_review_card_wrapper flex_row">
                <!-- card_1 -->
               
                <!-- card_2 -->
                
              
                <!-- card_3 -->
                
              
                <!-- card_4 -->
                
            </div>
            <!-- global red button -->
			<?php 
			// Get the ACF link field
			$read_all_reviews = get_field('read_all_reviews');

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


    <!-- global_recommended_product-->
    <section class="global_recomm_prodct_review">
        <div class="recomm_prodct_container container_1200 flex_column">
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
					
					<?php 
			$recommended_product = get_post_meta(get_the_ID(), 'recommended_product', true); 
			?>

			<span>
				<?php 
				if ($recommended_product) {
				echo $recommended_product;
				} else {
					echo 'No recommended Title found.';
				} 
				?>
			</span>
                  
                </div>
            </div>
            <div class="inner_col_container flex_column">
                <!-- inner_row -->
                <div class="inner_row flex_row">
                    <div class="lft_col flex_row">
                        <?php
                        // Get the group field from ACF in the options page
                        $group_field = get_field('brand', 'option');
					

                        if ($group_field) {
                            $brand_logo = $group_field['brand_image'];
                            $brand_name = $group_field['brand_name'];
                            $brand_product_name = $group_field['brand_product_name'];
                        }
                        ?>
                        <div class="col_1 flex_row">
                            <div class="brand_logo">
                                <a href="">
                                    <?php if ($brand_logo) : ?>
                                        <img class="w_auto" src="<?php echo esc_url($brand_logo['url']); ?>" alt="<?php echo esc_attr($brand_logo['alt']); ?>">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="brand_name flex_column">
                                <span><?php echo esc_html($brand_name); ?></span>
                                <span><?php echo esc_html($brand_product_name); ?></span>
                            </div>
                        </div>
                        <!-- between_line -->
                        <div class="line"> </div>
                        <?php
                        // Get the group field from ACF in the options page
                        $price_field = get_field('price', 'option');

                        if ($price_field) {
                            $price_one = $price_field['more_price'];
                            $price_two = $price_field['less_price'];
                        }
                        ?>
                        <div class="col_2 flex_row">
                            <span><?php echo esc_html($price_one); ?></span>
                            <span><?php echo esc_html($price_two); ?></span>
                        </div>
                        <!-- between_line -->
                        <div class="line"> </div>
                    </div>
                    <div class="mid_col flex_row">
                        <div class="col_3 global_stars_rating flex_row">
                            <div class="stars flex_row">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/full_star.svg" alt="Alternative Text">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/full_star.svg" alt="Alternative Text">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/full_star.svg" alt="Alternative Text">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/full_star.svg" alt="Alternative Text">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/star-half.svg" alt="Alternative Text">
                            </div>
                            <div class="line"> </div>
                            <div class="conut_purchase">
                                <?php
                                // Get the purchase count from ACF in the options page
                                $purchase_count = get_field('purchase', 'option');

                                if ($purchase_count === null) {
                                    $purchase_count = '0';
                                }
                                ?>
                                <?php echo esc_html($purchase_count); ?>
                            </div>
                        </div>
                        <!-- between_line -->
                        <div class="line"> </div>
                        <?php
                        // Get the group field from ACF in the options page
                        $group_field = get_field('Shares_group', 'option');

                        if ($group_field) {
                            // Get the share_image and share_text fields, even if empty
                            $share_image = $group_field['share_image'] ?? null;
                            $share_text = $group_field['share_text'] ?? 'No shares available';
                        }
                        ?>
                        <div class="col_4 shares_view flex_row">
                            <?php if ($share_image): ?>
                                <img class="w_auto" src="<?php echo esc_url($share_image); ?>" alt="Share Image">
                            <?php else: ?>
                                <img class="w_auto" src="assets/default-share.svg" alt="Default Share Image"> <!-- Fallback image -->
                            <?php endif; ?>
                            <span>
                                <?php echo esc_html($share_text); ?>
                            </span>
                        </div>
                    </div>
                    <div class="ryt_btns flex_row">
                       <?php
$main_group = get_field('two_buttons', 'option');

	if ($main_group) {
		// First button (SHOP NOW)
		if (isset($main_group['shop_now'])) {
			echo '<a href="' . esc_url($main_group['shop_now']['url']) . '" target="' . esc_attr($main_group['shop_now']['target']) . '" class="red_btn global_btn">';
			echo esc_html($main_group['shop_now']['title']);
			echo '</a>';
		}

		// Second button (Read Reviews)
		if (isset($main_group['read_review'])) {
			echo '<a href="' . esc_url($main_group['read_review']['url']) . '" target="' . esc_attr($main_group['read_review']['target']) . '" class="white_btn global_btn">';
			echo esc_html($main_group['read_review']['title']);
			echo '</a>';
		}
	}
	?>
                    </div>
                </div>
                <!-- bottom_col_content -->
                <div class="bottom_content flex_row">
                    <!-- l_content -->
                    <div class="l_img_wrapper">
                        <?php
                        // Get the image field from the ACF options page
                        $image = get_field('recomand_image', 'option');

                        if ($image):
                        ?>
                            <img class="w-auto" src="<?php echo esc_url($image); ?>" alt="Descriptive Alt Text" loading="lazy">
                        <?php endif; ?>
                    </div>

                    <!-- r_content -->
                    <div class="r_content flex_column">
                        <!-- row_1 -->
                        <?php
                        $protecting_group = get_field('text_two_field', 'option');

                        if ($protecting_group):
                            $protecting_heading = $protecting_group['protecting_heading'];
                            $protecting_description = $protecting_group['protecting_discription'];
                        ?>
                            <div class="inner_row_1 flex_column">
                                <span><?php echo esc_html($protecting_heading); ?></span>
                                <p><?php echo esc_html($protecting_description); ?></p>
                            </div>
                        <?php endif; ?>
                        <!-- row_2 -->
                        <div class="inner_row_2 faq_sec flex_row">
                            <div class="accordion_card active">
                                <ul class="read_pros flex_row">
                                    <li>Read Pros :</li>
                                    <li><img class="w_auto rotate_180" src="<?php echo get_template_directory_uri(); ?>/images/down_arrow_recomm.svg" alt="">
                                    </li>
                                </ul>
                                <?php
                                // Retrieve the repeater field from the options page
                                $faq_items = get_field('read_pros_text', 'option');

                                if ($faq_items): ?>
                                    <ul class="faq_content">
                                        <?php foreach ($faq_items as $item): ?>
                                            <li><?php echo esc_html($item['simplify_text']); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>

                            <div class="line"></div>
                            <div class="accordion_card">
                                <ul class="read_cons flex_row">
                                    <li>Read Cons :</li>
                                    <li> <img class="w_auto rotate_180" src="<?php echo get_template_directory_uri(); ?>/images/down_arrow_recomm.svg" alt="">
                                    </li>
                                </ul>
                                <?php
                                // Retrieve the repeater field from the options page
                                $faq_items = get_field('read_pros_text', 'option');

                                if ($faq_items): ?>
                                    <ul class="faq_content">
                                        <?php foreach ($faq_items as $item): ?>
                                            <li><?php echo esc_html($item['simplify_text']);  ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- global_subscribe_update start -->
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