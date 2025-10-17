<?php
get_header();
?>

<main>

    <!-- global_stove_protector start -->
    <section class="global_stove_prot_bnfit">
        <div class="global_stove_prot_container container_1200 flex_row">
			<?php echo do_shortcode('[subscribe_section]'); ?>   
        </div>
    </section>
    <!-- single_blg_pg_sec_1 -->
    <section class="single_blg_pg_sec_1">
        <div class="single_blg_pg_sec_1_container container_1200 flex_row">
            <!-- l_col_wrapper -->
            <div class="wrapper_sticky">
                <div class="l_col_wrapper flex_column">
                    <!-- global_top_5_posts -->
                    <div class="global_top_5_posts_wrapper global_latest_posts flex_column">
                        <div class="global_latst_post_container  flex_column">
                            <!-- global_heading_txt_overline -->
                            <div class="inner_heading">
                                <span>TOP 5 THIS WEEK</span>
                            </div>
                            <!-- grid_col_posts -->
                            <div class="global_inner_posts_col grid_row">
                                <!-- post_1 -->
                                <?php echo postts(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- related_posts_wrapper -->
                    <div class="related_posts_wrapper global_top_5_posts_wrapper global_latest_posts flex_column">
                        <div class="global_latst_post_container  flex_column">
                            <!-- global_heading_txt_overline -->
                            <div class="inner_heading">
                                <span>RELATED POSTS</span>
                            </div>
                            <!-- grid_col_posts -->
                            <div class="global_inner_posts_col grid_row">
                                <!-- post_1, 2, 3, 4, 5-->
                                <?php echo relatedpost(); ?>
                            </div>
                        </div>
                    </div>
                    <!-- popular_articles -->
                    <div class="popular_artic_wrapper  global_top_5_posts_wrapper global_latest_posts flex_column">
                        <div class="global_latst_post_container  flex_column">
                            <!-- global_heading_txt_overline -->
                            <div class="inner_heading">
                                <span>POPULAR ARTICLES</span>
                            </div>
                            <!-- grid_col_posts -->
                            <div class="global_inner_posts_col grid_row">
                                <!-- post_1,2,3,4,5 -->
                                <?php
                                echo articals()
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ryt_col_wrapper -->
            <div class="ryt_col_wrapper flex_column">
                <!-- row_1 -->
                <div class="row_1 flex_column">
                    <!-- heading_row -->
                    <?php echo display_single_post(); ?>
                    <!-- faq section  -->
                    <?php echo do_shortcode('[faq_section]') ?>
                    <div class="inner_content_5 inner_content_1 flex_column">

                        <?php
                        // Retrieve the 'Single_conclusion' group field from the current post
                        $single_conclusion = get_field('Single_conclusion'); // Assuming ACF is being used for a group field

                        // Check if the 'Single_conclusion' group field exists
                        if ($single_conclusion) {
                            // Retrieve the heading and content from the group field
                            $conclusion_heading = $single_conclusion['Conclusion_heading']; // Access the heading subfield
                            $conclusion_content = $single_conclusion['Conclusion_content']; // Access the content subfield

                            // Ensure both heading and content are not empty
                            if (!empty($conclusion_heading) && !empty($conclusion_content)) {
                                // Output the heading and content
                                echo '<h4>' . esc_html($conclusion_heading) . '</h4>';
                                echo '<p>' . wp_kses_post($conclusion_content) . '</p>';
                            } else {
                                echo '<p>Heading or content is missing.</p>';
                            }
                        } else {
                            echo '<p>No conclusion found.</p>';
                        }
                        ?>
                        <?php
                        $tags = get_the_tags();
                        if ($tags) {
                            echo '<div class="tags_wrapper">';
                            echo '<ul class="flex_row">';
                            foreach ($tags as $tag) {
                                echo '<li><a href="' . esc_url(get_tag_link($tag->term_id)) . '">' . esc_html($tag->name) . '</a></li>';
                            }
                            echo '</ul>';
                            echo '</div>';
                        } ?>
                    </div>
                </div>

                <!-- previous and next-->
                <div class="row_2 flex_column">
                    <div class="img_col_wrapper flex_row">
                        <?php echo pre_nxt_posts() ?>
                    </div>
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                    <?php
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                    endwhile;
                    ?>
                </div>

            </div>
        </div>
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
				// Retrieve the 'recommended_product' field from options
			$recommended_product = get_field('recommended_product', 'option');  ?>
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