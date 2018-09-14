<div class="footer-block">
    <div class="menu-footer">
        <a class="brand" href="{{ home_url('/') }}">
            <img src="<?php echo get_site_icon_url() ?>">
            <div class="blog_info">{{ get_bloginfo('name', 'display') }}</div>
        </a>
        <nav class="nav-primary-footer">
            {!!  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        </nav>
    </div>
</div>