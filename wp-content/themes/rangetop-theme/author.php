<?php

get_header();
?>

<main>
    <!-- author_pg_sec_1 -->
    <section class="author_pg_sec_1">
        <div class="author_pg_sec_1_container container_1200">
            <div class="inner_wrapper flex_row">
                <div class="l_col_content flex_column">
                    <?php
                    $author_id = get_the_author_meta('ID');
                    $author_name = get_the_author();
                    $author_description = get_the_author_meta('description');
                    $author_facebook = get_the_author_meta('facebook');
                    $author_instagram = get_the_author_meta('instagram');
                    $author_image = get_avatar_url($author_id);
                    ?>
                    <!-- Author Name with Link -->
                    <a href="<?php echo get_author_posts_url($author_id); ?>"><?php echo esc_html($author_name); ?></a>
                    <div class="social_icons flex_row">
                        <?php if ($author_facebook): ?>
                            <a href="<?php echo esc_url($author_facebook); ?>">
                                <img class="w_auto" src="<?php echo get_template_directory_uri(); ?>/images/facebook_red.svg" alt="Facebook">
                            </a>
                        <?php endif; ?>
                        <?php if ($author_instagram): ?>
                            <a href="<?php echo esc_url($author_instagram); ?>">
                                <img class="w_auto" src="<?php echo get_template_directory_uri(); ?>/images/instagram_red.svg" alt="Instagram">
                            </a>
                        <?php endif; ?>
                    </div>
                    <p><?php echo esc_html($author_description); ?></p>
                    <a href="<?php echo esc_url(get_the_author_meta('user_url', $author_id)); ?>">
                        <?php echo esc_html(get_the_author_meta('user_url', $author_id)); ?>
                    </a>
                </div>
                <div class="ryt_author_img">
                    <a href="<?php echo get_author_posts_url($author_id); ?>">
                        <img src="<?php echo esc_url($author_image); ?>" alt="<?php echo esc_attr($author_name); ?>">
                    </a>
                </div>
            </div>
    </section>
    <!-- author_section_2 start -->
    <section class="author_sec_2">
        <div class="author_sec_2_container container_1200 flex_column">
            <!-- inner_col_1 -->
            <div class="inner_col_1 flex_column">
                <div class="global_heading flex_row">
                    <a href="">ABOUT</a>
                    <span class="line"></span>
                    <a href="">ARTICLES</a>
                    <span class="line"></span>
                    <a href="">ARCHIVE</a>
                </div>
                <p>
                    <?php
                    $about_author = get_field('about_author', 'user_' . $author_id);
                    // Check if the paragraph exists
                    if ($about_author) {
                        // Output the HTML with dynamic data
                        echo '<div class="achievements_section">';
                        echo '<div class="li_items flex_column">';
                        echo wp_kses_post($about_author);
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo 'No information about the author found.';
                    }
                    ?>
                </p>
            </div>
            <!-- inner_col_2 -->
            <div class="inner_col_2 flex_column">
                <?php
                $achievements = get_field('achievements', 'user_' . $author_id);
                if ($achievements) {
                    // Retrieve the subfields
                    $achievements_heading = $achievements['achievements_heading']; // Heading
                    $achievements_content = $achievements['achievements_content']; // WYSIWYG content
                    // Output the HTML with dynamic data
                    echo '<span>' . esc_html($achievements_heading) . '</span>';
                    echo '<div class="li_items flex_column">';
                    // Assuming the content contains a <ul><li> structure from WYSIWYG
                    echo wp_kses_post($achievements_content); // Display the WYSIWYG content
                    echo '</div>';
                } else {
                    echo 'No achievements found.';
                }
                ?>
            </div>
            <!-- col_3 -->
            <div class="inner_col_3 flex_column">
                <?php
                $area_experties = get_field('area_experties', 'user_' . $author_id);
                if ($achievements) {
                    // Retrieve the subfields
                    $area_heading = $area_experties['area_heading']; // Heading
                    $area_content = $area_experties['area_content']; // WYSIWYG content
                    // Output the HTML with dynamic data
                    echo '<span>' . esc_html($area_heading) . '</span>';
                    echo '<div class="li_items flex_column">';
                    // Assuming the content contains a <ul><li> structure from WYSIWYG
                    echo wp_kses_post($area_content); // Display the WYSIWYG content
                    echo '</div>';
                } else {
                    echo 'No achievements found.';
                }
                ?>
            </div>
            <!-- col_4 -->
            <div class="other_article_wrap flex_column">
                <?php
                $Other_article = get_field('Other_article', 'user_' . $author_id);
                if ($Other_article) {
            
                    $article_heading = $Other_article['article_heading']; 
                    $title_article = $Other_article['title_article'];
                   
                    echo '<span>' . esc_html($article_heading) . '</span>';
                    echo '<div class="li_items flex_column">';
                
                    echo wp_kses_post($title_article); 
                    echo '</div>';
                } else {
                    echo 'No achievements found.';
                }
                ?>
            </div>
            <!-- col_5 -->
            <div class="col_5 global_product_review" id="artical">
                <div class="inner_col_1 flex_column">
                    <div class="global_heading flex_row">
                        <a href="">ABOUT</a>
                        <span class="line"></span>
                        <a href="#artical">ARTICLES</a>
                        <span class="line"></span>
                        <a href="">ARCHIVE</a>
                    </div>
                    <div class="product_review_card_wrapper flex_row">
                        <?php echo author_posts(); ?>
                        <!-- card_1 -->
                    </div>
                </div>
            </div>
            <!-- col_6 -->
            <div class="col_6 flex_row">
                <div class="lft_wrapper faq_sec flex_column">

                    <div class="global_heading flex_row">
                        <a href="">ABOUT</a>
                        <span class="line"></span>
                        <a href="">ARTICLES</a>
                        <span class="line"></span>
                        <a href="">ARCHIVE</a>
                    </div>
                    <div class="faq_container flex_column">
                        <div class="inner_faq_accordion_wrapper flex_column">
                            <?php
                            // Get the FAQs for the author
                            $faqs = get_field('archive_faq', 'user_' . $author_id); // Replace 'author_page__faq' with your actual field name
                            // Check if FAQs exist
                            if ($faqs) {
                                // Loop through each FAQ
                                foreach ($faqs as $index => $faq) {
                                    $heading = isset($faq['archive_heading']) ? $faq['archive_heading'] : '';
                                    $content = isset($faq['archive_content']) ? $faq['archive_content'] : '';
                                    // Output each accordion card
                            ?>
                                    <div class="accordion_card<?php echo $index === 0 ? ' active' : ''; ?> flex_row">
                                        <!-- left content -->
                                        <div class="inner_content flex_column">
                                            <span><?php echo esc_html($heading); ?></span>
                                            <div class="faq_content flex_column">
                                                <a href="#"><?php echo $content; ?></a>
                                            </div>
                                        </div>
                                        <!-- right content -->
                                        <img class="w_auto cross_x" src="<?php echo get_template_directory_uri(); ?>/images/plus_black.svg" alt="">
                                    </div>
                            <?php
                                }
                            } else {
                                echo 'No FAQs found'; // Message if no FAQs exist
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- ryt_content -->
                <!-- global_top_5_posts -->
                <div class="global_top_5_posts_wrapper global_latest_posts flex_column">
                    <div class="global_latst_post_container  flex_column">
                        <!-- global_heading_txt_overline -->
                        <div class="inner_heading">
                            <span><span>TOP 5 THIS WEEK</span></span>
                        </div>
                        <!-- grid_col_posts -->
                        <div class="global_inner_posts_col grid_row">
                            <!-- post_1 -->
                            <?php echo author_postsss(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- author_section_2 end -->
</main>
<?php
get_footer();
?>