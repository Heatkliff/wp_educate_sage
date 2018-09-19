<div class="menu-dark-header-block">
    <div class="menu-dark-header">
        <div class="nav-dark-header">
            {!!  wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        </div>
        <div class="search-dark-header">
            {!! get_search_form() !!}
        </div>
    </div>
</div>