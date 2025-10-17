<?php
get_header();
?>
<main class="tfc_error">
      <div class="container_1200">
        <div class="error-404">
            <h1>Oops! Page Not Found</h1>
            <p>It looks like nothing was found at this location. You can return to the <a href="<?php echo home_url(); ?>">Homepage</a> or try searching below:</p>
            <div class="tfc_search_form_404">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>
