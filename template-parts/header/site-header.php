<?php 
$site_title = get_bloginfo( 'name' );
?>


<header class="site-header__container">
<nav class="site-header__nav">
    <li class="site-header__item"><a href="<?php echo esc_url( home_url() ); ?>"><?php echo esc_html($site_title) ?></a></li>
    <li class="site-header__item"><a href="#">Blog</a></li>
    <?php 
    if( ! is_user_logged_in() ) : ?>
        <a class="login-button" href="<?php echo esc_url( wp_login_url() ) ; ?>">Login</a>
    <?php 
    else: ?>
        <a class="logout-button" href="<?php echo esc_url( wp_logout_url() ); ?>">Logout</a>
    <?php 
    endif; ?>
</nav>


</header>