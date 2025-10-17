<?php if (current_user_can('administrator')) { ?>

    <div class="tnp-cards-container">


        <div class="tnp-card">

            <div class="tnp-step sender <?php echo!empty($steps['sender']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Your sender name and address</h3>
                    <p>
                        From who your subscribers will see the emails coming from?

                        <a href="?page=newsletter_main_main">Review</a>
                    </p>
                </div>
            </div>

            <div class="tnp-step forms <?php echo!empty($steps['forms']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Subscription: popup and inline forms</h3>
                    <p>
                        Activate the subscription forms to grow your subscriber list.

                        <a href="?page=newsletter_subscription_sources">Configure</a>.
                    </p>
                </div>
            </div>

            <div class="tnp-step <?php echo!empty($steps['notification']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Be notified when someone subscribes</h3>
                    <p>
                        Activate the notification when you get a new subscriber.

                        <a href="?page=newsletter_subscription_options#advanced">Configure</a>.
                    </p>
                </div>
            </div>

            <div class="tnp-step welcome-email <?php echo!empty($steps['welcome-email']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Welcome email: give it your style</h3>
                    <p>
                        Customize the welcome email to reflect your style.
                        <a href="?page=newsletter_subscription_welcome">Review</a>.
                    </p>
                </div>
            </div>



            <div class="tnp-step addons-manager <?php echo!empty($steps['addons-manager']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Get a free license</h3>
                    <p>
                        And install free addons to get more power.

                        <a href="?page=newsletter_main_extensions">Get it</a>.
                    </p>
                </div>
            </div>
        </div>


        <div class="tnp-card">


            <div class="tnp-step test-email <?php echo!empty($steps['test-email']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Test the email delivery</h3>
                    <p>
                        Check if your blog can deliver emails.

                        <a href="?page=newsletter_system_delivery">Run a test</a>.
                    </p>
                </div>
            </div>

            <div class="tnp-step company <?php echo!empty($steps['company']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Your company info and socials</h3>
                    <p>
                        Review your company info and socials

                        <a href="?page=newsletter_main_info">Review</a>.
                    </p>
                </div>
            </div>

            <div class="tnp-step first-newsletter <?php echo!empty($steps['first-newsletter']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Create your first newsletter</h3>
                    <p>
                        Explore the composer and send it.

                        <a href="?page=newsletter_emails_index">Go create</a>.
                    </p>
                </div>
            </div>

            <div class="tnp-step <?php echo!empty($steps['delivery-speed']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Change the delivery speed</h3>
                    <p>
                        Set how many emails per hour you want to send.

                        <a href="?page=newsletter_main_main">Review</a>
                    </p>
                </div>
            </div>

            <div class="tnp-step <?php echo!empty($steps['automated']) ? 'ok' : ''; ?>">
                <div>
                    <i class="fas fa-check"></i>
                </div>
                <div>
                    <h3>Explore the Automated Newsletters</h3>
                    <p>
                        Everything on autopilot: set the direction and relax

                        <a href="?page=newsletter_main_automated">Check it out.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php } ?>