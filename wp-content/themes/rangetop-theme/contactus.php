<?php
/*Template Name: Contact page */
get_header();
?>
<main>
    <section class="contact_us_sec">
            <div class="contact_us_container container_1200 flex_column">
                <div class="contact_form_wrapper flex_column">
                    <div class="heading_col flex_column">
                        <h1> 
                            <?php
                            $heading  = get_field('heading');
                              if( $heading ){
                               echo  $heading ;
                                }else{
                                echo 'not founded';
                                }
                             ?>
                        </h1>
                        <p>
                            <?php
                                 $contact_peragraph  = get_field('contact_peragraph');
                                 if( $contact_peragraph ){
                                 echo  $contact_peragraph ;
                                 }else{
                                 echo 'not founded';
                                }
                            ?>
                        </p>
                    </div>
                    <!-- form  -->
                    <?php echo do_shortcode('[contact-form-7 id="6c049bd" title="Contact form"]')?>
                </div>
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
</main>
<?php
get_footer();
?>