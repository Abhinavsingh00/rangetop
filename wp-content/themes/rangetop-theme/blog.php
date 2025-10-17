<?php
/*Template Name: Blog page */
get_header();
?>



<main>
<section class="blog_pg_sec_1">
    <!-- top_heading_sec -->
    <div class="top_heading_sec">
        <div class="heading_sec_container flex_column">
            <h3>
                <?php
                    $protector_heading = get_field('protector_heading');
                    echo $protector_heading ? $protector_heading : 'not found';
                ?>
            </h3>
            <div class="list_items">
            <div class="filter_section">
    <div class="list_items">
        <ul class="flex_row">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<li><a href="' . add_query_arg('category', $category->slug) . '">' . $category->name . '</a></li>';
            }
            ?>
        </ul>
    </div>
</div>

            </div>
        </div>
    </div>

    <div class="blog_pg_sec_1_container global_product_review container_1200 flex_column">
        <!-- Category Filter -->

        <!-- bottom_col_2 start -->
        <div class="col_2">
            <div class="product_review_card_wrapper flex_row">
                <?php
                function display_posts_with_filter()
                {
                    $category_slug = isset($_GET['category']) ? $_GET['category'] : '';

                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'category_name' => $category_slug // Filters posts by category
                    );

                    $custom_query = new WP_Query($args);

                    if ($custom_query->have_posts()) :
                        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                            <div class="card_1 flex_column">
                                <a href="<?php the_permalink(); ?>">
                                    <img class="prodct_img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
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
                              
                                </div>
                            </div>
                            <div class="line"></div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No posts found</p>';
                    endif;
                }

                display_posts_with_filter();
                ?>
            </div>
        </div>
        <!-- bottom_col_2 end -->
    </div>
</section>


<div class="hr_line container_1200">
    <hr>
</div>

<!-- blog_pg_sec_2 -->
<section class="blg_pg_sec_2">
    <div class="blg_pg_sec_2_container global_latest_posts container_1200 flex_row">
        <!-- left_col_wrapper -->
        <div class="lft_col global_inner_posts_col grid_row">
            <!-- post_1 -->
            <?php echo eightposts() ?>
        </div>
        <!-- ryt_col_wrapper -->
        <!-- global_top_5_posts -->
        <div class="global_top_5_posts_wrapper global_latest_posts flex_column">
            <div class="global_latst_post_container  flex_column">
                <!-- global_heading_txt_overline -->
                <div class="inner_heading">
                    <span>
                    <?php
                    $top_five  = get_field('top_five');
                        if( $top_five ){
                         echo  $top_five ;
                          }else{
                          echo 'not founded';
                          }
                   ?>
                </span>
                </div>

                <!-- grid_col_posts -->
                <div class="global_inner_posts_col grid_row">
                    <!-- post_1 -->
                       <?php echo top_five_posts()?>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- global_stove_protector start -->
<section class="global_stove_prot_bnfit">
           <div class="global_stove_prot_container container_1200 flex_row">
			<?php echo do_shortcode('[subscribe_section]'); ?>   
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
                    <span>PRODUCT REVIEW</span>
                </div>
            </div>
                  <?php echo do_shortcode('[wp-testimonials widget-id=1]')?>
            <!-- product_review_card_wrapper -->
            <div class="product_review_card_wrapper flex_row">
            </div>
            <!-- global red button -->
            <a href="" class="red_btn global_btn">Read All Reviews</a>
        </div>
    </section>

<!-- global_faq_sec start -->

  <!-- faq -->
  <?php echo do_shortcode('[faq_section]')?>



<!-- global_faq_sec end -->

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