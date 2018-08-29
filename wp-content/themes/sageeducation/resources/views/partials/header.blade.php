<div id="layer"></div>
<header class="banner">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">
      <img src="<?php echo get_site_icon_url() ?>">
      <div class="blog_info">{{ get_bloginfo('name', 'display') }}</div>
    </a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!!  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        <div id="btn"><span>&#9776</span></div>
      @endif
    </nav>
  </div>
</header>