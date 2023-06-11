<?php 
get_header();

if ( is_user_logged_in() ) :
    
else: ?>
<main>

    <section class="login__section">
            <div class="login-form__container registered-content">
                <?php wp_login_form() ?>
            </div>
    </section>

</main>
<?php 
endif;

get_footer();