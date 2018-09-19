<div class="dark-header-about-menu-block">
    <div class="dark-header-about-menu">
        <div class="dark-header-about-link">
            <a href="{!! get_field("dark_header_settings", "option")['page_about_me'] !!}">About me</a>
        </div>
        <div class="dark-header-social-icons">
            @foreach(get_field("dark_header_settings","option")['social_network_and_link'] as $element)
                <a href="{!! $element['social_network_link']['url'] !!}">
                    <img src="{!! $element['social_network_icon']['url'] !!}" alt="">
                </a>
            @endforeach
        </div>
    </div>
</div>