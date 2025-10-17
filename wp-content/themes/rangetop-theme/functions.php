<?php
function my_theme_enqueue_styles() {
	wp_enqueue_style('my-custom-theme-style', get_template_directory_uri() . '/style.css', false, microtime(), 'all');
//     wp_enqueue_style( 'my_theme_style', get_stylesheet_uri() );
    if(is_page('home')){
      wp_enqueue_style( 'home_page_css', get_template_directory_uri() .'/css/index.css', false, microtime(), 'all');
    }
   if (is_single()) {
        wp_enqueue_style('single', get_template_directory_uri() . '/css/single_blog_page.css', array(), microtime(), 'all');
    }
// Contact-us page
  if (is_page('contact-us')){ 
   wp_enqueue_style( 'contact', get_template_directory_uri() .'/css/contact_us.css', false, microtime(), 'all');
    }
	  
   wp_enqueue_style( 'blog', get_template_directory_uri() .'/css/blog_page.css', false, microtime(), 'all');
	
	  //  author page
    if (is_author()) {
        wp_enqueue_style( 'author', get_template_directory_uri() . '/css/author_page.css', false, microtime(), 'all' );
    }

//404 page
   if ( is_404() ) {
        wp_enqueue_style('404_css', get_template_directory_uri() . '/css/404.css', array(), microtime(), 'all');
    }

  wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap', false );  

   wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/js/global.js', array('jquery'), microtime(), true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

// font-family
function custom_google_fonts() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@100..900&family=Big+Shoulders+Text:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Slab:wght@100..900&display=swap',
        array(),
        null
    );
}
add_action('wp_enqueue_scripts', 'custom_google_fonts');

// header right side button add 
function rangetop_customize_register($wp_customize) {
    $wp_customize->add_section('header_button_section', array(
        'title'    => __('Header Button', 'rangetop-theme'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('header_button_text', array(
        'default'   => __('Subscribe', 'rangetop-theme'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('header_button_text_control', array(
        'label'    => __('Button Text', 'rangetop-theme'),
        'section'  => 'header_button_section',
        'settings' => 'header_button_text',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('header_button_url', array(
        'default'   => '#',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('header_button_url_control', array(
        'label'    => __('Button URL', 'rangetop-theme'),
        'section'  => 'header_button_section',
        'settings' => 'header_button_url',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'rangetop_customize_register');


//svg image 
function custom_mime_types( $mimes ) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'custom_mime_types' );


//custom logo 
function themename_custom_logo_setup() {
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'site-title', 'site-description' ),
		'unlink-homepage-logo' => true, 
	);
	add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


//registr menu 
function register_my_menus() {
  register_nav_menus(
      array(
          'primary-menu' => __( 'Header Menu' ),
          'footer-menu'  => __( 'Footer Menu' ),
          'mobile-menu' => __( 'mobile-menu' ),
          
      )
  );
}
add_action( 'init', 'register_my_menus' );


//featured image 
add_theme_support( 'post-thumbnails' );


// post 
function posts(){
    $args = array(
        'post_type' => 'post', 
        'posts_per_page' => 3,
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
                            <a href=""><?php the_category(', ');?></a>
                        </div>
                        <div class="ryt_shares flex_row">
                          <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                        </div>  
                    </div>
                    <p><?php echo wp_trim_words(get_the_content(), 20, '...'); ?></p>
                </div>
            </div>
            <div class="line"></div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
    endif;
    return ob_get_clean();
}


//Four category home page  
function get_dynamic_category_section($category_ids = array(18, 19, 20, 21)) {
    $terms = get_terms(array(
        'taxonomy' => 'category',
        'hide_empty' => false,
        'include' => $category_ids,
        'number' => 4
    ));
    $output = '<div class="categ_wrapper flex_row">';
    if (!empty($terms) && !is_wp_error($terms)) {
        foreach ($terms as $term) {
            $image = get_field('protector', 'term_' . $term->term_id);
            $term_link = get_term_link($term);
            $term_name = esc_html($term->name);
            $output .= '
            <div class="inner_feature_post">
                <div class="img_1">
                    <a href="' . esc_url($term_link) . '">';
            if ($image) {
                $output .= '<img src="' . esc_url($image) . '" alt="' . esc_attr($term_name) . '">';
            }
            $output .= '</a>
                </div>
                <div class="inner_txt">
                    <a href="' . esc_url($term_link) . '">' . $term_name . '</a>
                </div>
            </div>';
        }
    }
    $output .= '</div>';
    return $output;
}


//category homepage
function posts_by_category() {
  $args = array(
      'post_type' => 'post', 
      'posts_per_page' => 4,
      'category_name' => 'kitchen', 
  );
  $custom_query = new WP_Query($args);
  if ($custom_query->have_posts()) :
      ob_start(); 
      while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
          <div class="card_1 flex_column">
              <a href="<?php the_permalink(); ?>"> 
                  <?php 
                  $custom_image = get_field('custom_image'); 
                  if ($custom_image) : ?>
                      <img class="prodct_img" src="<?php echo esc_url($custom_image['url']); ?>" alt="image">
                  <?php else : ?>
                      <img class="prodct_img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
                  <?php endif; ?>
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
      return ob_get_clean(); 
  else :
      return '<p>No posts found</p>';
  endif;
}


//latest post home page 
function latest_posts() {
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 4, 
        'orderby' => 'date', 
        'order' => 'DESC', 
    );

    $custom_query = new WP_Query($args);
    
    if ($custom_query->have_posts()) :
        ob_start(); 
        ?>
        <div class="global_inner_posts_col grid_row">
            <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <div class="post_wrap flex_row">
                    <div class="post_img">
                        <a href="<?php the_permalink(); ?>">
                            <img class="w_auto" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                        </a>
                    </div>
                    <div class="ryt_col_content flex_column">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="content_wrap flex_row">
                            <?php echo get_the_category_list(', '); ?>
                            <span><?php echo get_the_date(); ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
        wp_reset_postdata(); 
        return ob_get_clean(); 
    else :
        return '<p>No posts found</p>'; 
    endif;
}


// footer widgets 
function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => 'Footer left logo',
        'id'            => 'footer-logo',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Footer Social  Icons',
        'id'            => 'facebook',
        'before_widget' => '<div class="tfc_widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Copyright',
        'id'            => 'copyrights',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
  }
  add_action( 'widgets_init', 'my_theme_widgets_init' );





//top five posts singlepost 
function postts() {
    ob_start(); 
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="post_wrap flex_row">
                <div class="post_img">
                    <a href="<?php the_permalink(); ?>">
                        <img class="w_auto" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    </a>
                </div>

                <div class="ryt_col_content flex_column">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="content_wrap flex_row">
                        <?php the_category(', '); ?>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    
    return ob_get_clean(); 
}


//related post singlepost
function relatedpost() {
    ob_start(); 
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5,
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
         <div class="post_wrap flex_row">
            <div class="ryt_col_content flex_column">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <div class="content_wrap flex_row">
                    <?php 
                    $categories = get_the_category(); 
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                    ?>
                </div>
            </div>
                </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
    return ob_get_clean(); 
}


//popular artical single post
function articals() {
    ob_start();
    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'orderby'        => 'comment_count',  
        'order'          => 'DESC' 
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
         <div class="post_wrap flex_row">
            <div class="ryt_col_content flex_column">
                <!-- Dynamic Post Title -->
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
         </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No popular posts found.</p>';
    endif;
    
    return ob_get_clean(); 
}


//single post page singlepost
function display_single_post() {
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
        <div class="heading_row flex_column">
            <h2><?php the_title(); ?></h2>
            <a href="<?php echo esc_url(get_category_link(get_the_category()[0]->term_id)); ?>">
                <?php echo esc_html(get_the_category()[0]->name); ?>
            </a>
        </div>
        <div class="author_social_link_row flex_row">
            <div class="lft_author_col flex_row">
                <div class="author_img">
                    <?php echo get_avatar(get_the_author_meta('ID'), 64); ?>
                </div>
                <div class="ryt_content_col flex_row">
                    <div class="author_name">
                        <span>AUTHOR:</span>
                        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
                            <?php the_author(); ?>
                        </a>
                    </div>
                    <div class="vertical_line"></div>
                    <span><?php echo get_the_date('F j, Y'); ?></span>
                </div>
            </div>

            <div class="ryt_social_links_col flex_row">
                <a href="https://www.facebook.com/"><img class="w_auto cross_x" src="<?php echo esc_url(get_template_directory_uri() . '/images/facebook.svg'); ?>" alt=""></a>
                <a href="https://twitter.com/"><img class="w_auto cross_x" src="<?php echo esc_url(get_template_directory_uri() . '/images/twitter_white.svg'); ?>" alt=""></a>
                <a href="https://www.instagram.com/"><img class="w_auto cross_x" src="<?php echo esc_url(get_template_directory_uri() . '/images/insta_white.svg'); ?>" alt=""></a>
                <a href="https://in.pinterest.com/"><img class="w_auto cross_x" src="<?php echo esc_url(get_template_directory_uri() . '/images/pintrest_white.svg'); ?>" alt=""></a>
            </div>
        </div>
        <?php if (has_post_thumbnail()) : ?>
            <div class="inner_img">
                <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
            </div>
        <?php endif; ?>
        <div class="inner_content_1 flex_column">
            <h4><?php the_title(); ?></h4>
            <p><?php the_content(); ?></p>
        </div>

        <?php endwhile;
    else :
        echo '<p>No posts found.</p>';
    endif;
}


//pre and next posts singlepost
function pre_nxt_posts() {
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
            <?php
            // Previous Post
            $prev_post = get_previous_post();
            if (!empty($prev_post)) : ?>
                <div class="img_wrapper">
                    <div class="inner_img flex_column">
                        <a href="<?php echo get_permalink($prev_post->ID); ?>">PREVIOUS ARTICLE</a>
                        <a href="<?php echo get_permalink($prev_post->ID); ?>">
                            <?php echo get_the_post_thumbnail($prev_post->ID, 'thumbnail', array('alt' => $prev_post->post_title)); ?>
                        </a>
                        <span class="pre-post-center"><?php echo esc_html($prev_post->post_title); ?></span>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Next Post -->
            <?php
            $next_post = get_next_post();
            if (!empty($next_post)) : ?>
                <div class="img_wrapper">
                    <div class="inner_img flex_column">
                        <a href="<?php echo get_permalink($next_post->ID); ?>">NEXT ARTICLE</a>
                        <a href="<?php echo get_permalink($next_post->ID); ?>">
                            <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail', array('alt' => $next_post->post_title)); ?>
                        </a>
                        <span class="pre-post-center"><?php echo esc_html($next_post->post_title); ?></span>
                    </div>
                </div>
            <?php endif; ?>

        <?php endwhile;
    else :
        echo '<p>No posts found.</p>';
    endif;
}


//auther information  faq section      
function author_posts() {
    ob_start(); 
    $author_id = get_the_author_meta('ID');
    $args = array(
        'post_type' => 'post', 
        'posts_per_page' => 4, 
        'author' => $author_id, 
    );
    $custom_query = new WP_Query($args);
    // Check if posts are found
      if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
        
            <div class="card_1 flex_column">
                <div class="prodct_img">
                    <a href="<?php the_permalink(); ?>">
                        <img class="prodct_img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title_attribute(); ?>">
                    </a>
                </div>
                <div class="content_col flex_column">
                    <div class="heading_txt flex_column">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>

                    <div class="stars_nd_shares flex_row">
                        <div class="lft_stars flex_row">
                            <a href=""><?php the_category(', '); ?></a>
                        </div>
                        <div class="ryt_shares flex_row">
                            <a href=""><?php the_author(); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line"></div> 
        <?php endwhile;
        wp_reset_postdata(); 
    else :
        echo '<p>No posts found by this author.</p>';
    endif;
    return ob_get_clean(); 
}


//autor page top five posts 
function author_postsss() {
    ob_start(); 
    $author_id = get_the_author_meta('ID');
    $args = array(
        'post_type' => 'post', 
        'posts_per_page' => 5, 
        'author' => $author_id, 
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="post_wrap flex_row">
                <div class="ryt_col_content flex_column">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="content_wrap flex_row">
                       <?php the_category(', '); ?>
                        <span><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
        <?php endwhile;
        wp_reset_postdata(); 
    else :
        echo '<p>No posts found by this author.</p>';
    endif;
    
    return ob_get_clean(); 
}


//blog page 8 posts
function eightposts() {
    ob_start(); 
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 8, 
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <div class="post_wrap flex_row">
                <div class="post_img">
                    <a href="<?php the_permalink(); ?>">
                        <img class="w_auto" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image">
                    </a>
                </div>
                <div class="ryt_col_content flex_column">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <div class="content_wrap flex_row">
                        <a href="<?php echo get_category_link(get_the_category()[0]->term_id); ?>">
                            <?php echo get_the_category()[0]->name; ?>
                        </a>
                        <span><?php echo get_the_date('F j, Y'); ?></span>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No posts found</p>';
    endif;
    return ob_get_clean(); // Return the buffered content
}


//blog page top five posts 
function top_five_posts() {
    $args = array(
        'post_type' => 'post', 
        'posts_per_page' => 5, 
        'orderby' => 'date', 
        'order' => 'DESC', 
    );
    $custom_query = new WP_Query($args);
    if ($custom_query->have_posts()) : ?>
        <div class="lft_col global_inner_posts_col grid_row">
            <?php
            while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <div class="post_wrap flex_row">
                    <div class="ryt_col_content flex_column">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <div class="content_wrap flex_row">
                          <?php the_category(', '); ?>
                            <span><?php the_time('F j, Y'); ?></span>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php
    wp_reset_postdata();
    else :
        echo '<p>No posts found.</p>';
    endif;
}

                  
// faq 
function faq_section_shortcode() {
    ob_start(); 
    ?>
    <section class="faq_sec">
        <div class="faq_main_container container_1200 flex_column">
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
                    <span>FAQ’S</span>
                </div>
            </div>
            <div class="faq_container flex_column">
                <div class="inner_faq_accordion_wrapper flex_column">
                <?php
                // Retrieve the FAQ repeater field from the ACF options page
                $accordion_items = get_field('faq_section', 'option');
                if ($accordion_items) {
                    $is_first = true; // To track the first accordion item
                    foreach ($accordion_items as $item) {
                        // Ensure both title and content are not empty
                        if (!empty($item['faq_content']) && !empty($item['faq_discription'])) {
                            ?>
                            <div class="accordion_card flex_row <?php echo $is_first ? 'active' : ''; ?>">
                                <!-- left content  -->
                                <div class="inner_content flex_column">
                                    <span><?php echo esc_html($item['faq_content']); ?></span>
                                    <div class="faq_content">
                                        <p><?php echo wp_kses_post($item['faq_discription']); ?></p>
                                    </div>
                                </div>
                                <!-- right content  -->
                                <img class="w_auto cross_x" src="<?php echo esc_url(get_template_directory_uri() . '/images/plus_black.svg'); ?>" alt="">
                            </div>
                            <?php
                            $is_first = false; 
                        }
                    }
                }
                ?>
                </div>
					<?php 
			$View_all = get_field('view_all_button', 'option');
			if ($View_all) : 
				$button_url = $View_all['url'];
				$button_title = $View_all['title'];
				$button_target = $View_all['target'] ? $View_all['target'] : '_self';
				?>
				<a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>">
					<button class="red_btn global_btn"><?php echo esc_html($button_title); ?></button>
				</a>
			<?php endif; ?>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean(); 
}
add_shortcode('faq_section', 'faq_section_shortcode');




// global section Subscribe Now
function subscribe_section_shortcode() {
    ob_start();
    $stove_protector_section = get_field('stove_protector_section', 'option');

    if ($stove_protector_section) :
        $first_subscribe = $stove_protector_section['first_subcribe'];
        $subscribe_text = $stove_protector_section['subscribe_text'];
        $subscribe_button = $stove_protector_section['subscribe_button'];
        ?>
        <div class="inner_wrapper flex_row">
            <div class="lft_col_wrapper flex_column">
                <h1><?php echo esc_html($first_subscribe); ?></h1>
                <p><?php echo esc_html($subscribe_text); ?></p>
            </div>
            <div class="global_mid_line_red"></div>
            <div class="ryt_col">
                <!-- global red button -->
                <?php 
                if ($subscribe_button) : 
                    $button_url = $subscribe_button['url'];
                    $button_title = $subscribe_button['title'];
                    $button_target = $subscribe_button['target'] ? $subscribe_button['target'] : '_self';
                    ?>
                    <a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>">
                        <button class="red_btn global_btn"><?php echo esc_html($button_title); ?></button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php
    endif;
    return ob_get_clean();
}
add_shortcode('subscribe_section', 'subscribe_section_shortcode');

// Subscribe for new update
function footer_subscribe_shortcode() {
    ob_start();
    ?>
    <div class="lft_col_wrapper flex_column">
        <h1><?php the_field('footer_subscribe', 'option'); ?></h1>
        <p><?php the_field('footer_sub_text', 'option'); ?></p>
    </div>
	<div class="global_mid_line_red"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('footer_subscribe_section', 'footer_subscribe_shortcode');





 

