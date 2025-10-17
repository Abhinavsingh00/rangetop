<footer>
        <div class="footer_container container_1200 flex_column">
            <div class="col_1 flex_row">
				
            <a href=""><?php dynamic_sidebar('footer-logo');?></a>
                
                <div class="social_link flex_row">
                    <div class="flex_column">
                    <?php dynamic_sidebar('facebook');?>
                        
                    </div>
                </div>
            </div>


            <div class="col_2 flex_row">
                <div class="copyright_container">
                    <p><?php dynamic_sidebar('copyrights');?></p>
                </div>

            </div>
        </div>
    </footer>
<?php wp_footer();?>
</body>
</html>